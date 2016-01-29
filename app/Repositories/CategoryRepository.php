<?php
namespace App\Repositories;
use DB;
use Request;
use URL;
use App\Models\Category as Category;
use App\Interfaces\CategoryRepositoryInterface;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
	 public $tempHolder;

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return 'App\\Models\\Category';
    }
	
	/*
	*返回绑定的Prop表值
	*
	*
	*/
    public function hasOneProp($model)
	{
		return $model->hasOne('App\Models\Goods\CategoryBindProp','cid','id');
	}
	
	/**
	*返回绑定的Prop属性值
	*
	*
	*/
	public function getProp($model)
	{
	   $items=[];//所有的关联属性;
	   $clp=$this->hasOneProp($model)->get();
	   if($clp->count()>0)
	   {
	   $item_ids=$clp->first()->props;
	   $props=explode(';',$item_ids);
	   $items=DB::table('category_item_props') ->whereIn('id',$props) ->get();
	   }
	   return $items;
	}
	
    /**
     * Return submenu of given parent.
     *
     * @param int $parent
     *
     * @return result
     */
    public function getSubcategory($parent)
    {
        $Category = $this->model
                        ->whereParentId($parent)
                        ->get();
        $this->resetModel();

        return $Category;
    }

    /**
     * Get the breadcrumb for a Category.
     *
     * @param int $id
     *
     * @return type
     */
    public function breadscrump($id)
    {
        $this->tempHolder = [];

        $this->_breadscrump($id);

        return array_reverse($this->tempHolder);
    }

    /**
     * Recrusive function for breadcrumb.
     *
     * @param int $id
     *
     * @return null
     */
    public function _breadscrump($id)
    {
        $Category = $this->model
                        ->whereId($id)
                        ->first();
        $this->resetModel();

        if (!count($Category)) {
            return;
        }

        $this->tempHolder[$Category->id] = $Category;

        if ($Category->parent_id == 0) {
            return;
        }

        return $this->_breadscrump($Category->parent_id);
    }

    /**
     * Select root Category.
     *
     * @return result
     */
    public function rootCategories()
    {
        $Category = $this->model
                        ->whereParentId(0)
                        ->get();
        $this->resetModel();

        return $Category;
    }

    /**
     * Return all sub menus.
     *
     * @param string $key
     *
     * @return result
     */
    public function getAllSubCategories($id)
    {
        #return $this->getCategoryBy($key);

        return $this->getCategory($id);
    }

    /**
     * Get sub ment by id.
     *
     * @param int $id
     *
     * @return result
     */
    public function getSubCategories($id)
    {
        $Category = $this->model
                        ->whereParentId($id)
                        ->get();
        $this->resetModel();

        return($Category);
    }

    /**
     * Get Category by id.
     *
     * @param type $id
     *
     * @return type
     */
    public function getCategoryById($id)
    {
        return $this->getCategory($id);
    }

    /**
     * Get Category by key.
     *
     * @param string $key
     *
     * @return type
     */
    public function getCategoryByKey($key)
    {
        $Category = $this->model
                        ->whereKey($key)
                        ->first();
        $this->resetModel();

        return $this->getCategory($Category->id);
    }

    public function getCategoryId($key)
    {
        $Category = $this->model
                        ->whereKey($key)
                        ->first();
        $this->resetModel();

        return $Category->id;
    }

    public function getCategory($id)
    {
        $array = [];
        $this->_getCategory($id, $array);
        $this->setNodes($array);

        return $array;
    }

    public function _getCategory($id, &$array, $key = 0)
    {
        $menus = $this->model
                        ->whereParentId($id)
                        ->orderBy('order', 'ASC')
                        ->get();
        $this->resetModel();

        if ($menus->count() == 0) {
            return;
        }

        $i = 0;
        foreach ($menus as $Category) {
            $array[$key.'.'.++$i] = $Category;

//            if(!$Category->has_sub)
//                continue;

            $this->_getCategory($Category->id, $array, $key.'.'.$i);
        }

        return;
    }

    public function getAdminCategory($id)
    {
        $this->tempHolder = [];

        $this->_getAdminCategory($id, 1);

        return $this->tempHolder;
    }

    public function _getAdminCategory($id, $level)
    {
        $menus = $this->model
                        ->whereParentId($id)
                        ->orderBy('order', 'ASC')
                        ->get()
                        ->toArray();
        $this->resetModel();
        if (empty($menus)) {
            return;
        }

        foreach ($menus as $Category) {
            $this->tempHolder[$Category['id']] = $Category;
            $this->tempHolder[$Category['id']]['level'] = $level;
//            if(!$Category['has_sub'])
//                continue;
            $this->_getAdminCategory($Category['id'], $level + 1);
        }

        return;
    }

    public function setNodes(&$array)
    {
        $node = $this->getActiveNode($array);
        foreach ($array as $k => $v) {
            $array[$k]->root = false;
            $array[$k]->parent = false;
            $array[$k]->active = false;

            if (substr_count($k, '.') == 1) {
                $array[$k]->root = true;
            }

            if (array_key_exists($k.'.1', $array)) {
                $array[$k]->parent = true;
            }

            if ((strrpos($node, $k.'.') !== false) || ($node === $k)) {
                $array[$k]->active = true;
            }
        }
    }

    public function getActiveNode($array)
    {
        $array = array_reverse($array);
        foreach ($array as $k => $v) {
            $url = URL::to($v->url);
            if (strrpos(Request::url(), $url) !== false) {
                return $k;
            }
        }

        return 0;
    }

    public function updateTree($id, $json)
    {
        $tree = json_decode($json, true);
        $this->tempHolder = [];
        $this->getParentChild($id, $tree);
        foreach ($this->tempHolder as $key => $val) {
            $this->updateParent($key, $val);
        }
    }

    public function getParentChild($id, $array)
    {
        foreach ($array as $node) {
            $this->tempHolder[$id][] = array_get($node, 'id');
            if (isset($node['children'])) {
                $this->getParentChild(array_get($node, 'id'), $node['children']);
            }
        }
    }

    /**
     * Select root Category.
     *
     * @return result
     */
    public function updateParent($parent, $children)
    {
        print_r($parent);
        print_r($children);
        foreach ($children as $key => $val) {
            $this->update(['parent_id' => $parent, 'order' => $key], $val);
        }
    }
}