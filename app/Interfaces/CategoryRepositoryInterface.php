<?php
namespace App\Interfaces;
interface CategoryRepositoryInterface
{
	public function getSubCategory($parent);

    public function rootCategories();

    public function breadscrump($id);

    public function _breadscrump($id);
}