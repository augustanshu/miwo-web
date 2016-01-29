<?php
namespace App;
use View;
use App\Interfaces\CategoryRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
class Category 
{
	protected $model;
	protected $categoryBuilder;
	public function __construct(CategoryRepositoryInterface $category)
	{
		$this->model=$category;
	}
	public function model()
	{
		return $this->model->getModel();
	}
	
	public function category($key,$view='default')
	{
		 $category = $this->model->getcategory($key);
         return View::make("Goods.category.category.$view", compact('category'));
    }

    public function select($key, $view = 'default')
    {
        $menu = $this->model->getAllSubMenus($key);

        #return View::make("menu::menu.$view", compact('menu'));
    }

}