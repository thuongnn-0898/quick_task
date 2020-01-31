<?php
namespace App\Repositories;
use Illuminate\Database\Eloquent;

interface TaskRepositoryInterface
{

    public function getList();

    public function forUser();
}
?>
