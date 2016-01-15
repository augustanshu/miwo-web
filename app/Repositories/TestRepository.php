<?php
namespace App\Repositories;
use App\Interfaces\TestRepositoryInterface;

class TestRepository implements TestRepositoryInterface
{
	public function callTY()
	{
		dd('123123');
	}
}