<?php

namespace App\Repositories\Backend\Category;

/**
 * Interface CategoryContract
 * @package App\Repositories\Category
 */
interface CategoryContract
{
    /**
     * @param  $id
     * @return mixed
     */
    public function findOrThrowException($id);

    /**
     * @param  $per_page
     * @return mixed
     */
    public function getCategoriesPaginated($per_page);
//
//    /**
//     * @param  $per_page
//     * @return \Illuminate\Pagination\Paginator
//     */
//    public function getDeletedCategoriesPaginated($per_page);
//
//    /**
//     * @param  string  $order_by
//     * @param  string  $sort
//     * @return mixed
//     */
//    public function getAllCategories($order_by = 'id', $sort = 'asc');
//
//    /**
//     * @param $input
//     * @param $roles
//     * @param $permissions
//     * @return mixed
//     */
//    public function create($input, $roles, $permissions);
//
//    /**
//     * @param $id
//     * @param $input
//     * @param $roles
//     * @param $permissions
//     * @return mixed
//     */
//    public function update($id, $input, $roles, $permissions);
//
//    /**
//     * @param  $id
//     * @return mixed
//     */
//    public function destroy($id);
//
//    /**
//     * @param  $id
//     * @return mixed
//     */
//    public function delete($id);
//
//    /**
//     * @param  $id
//     * @return mixed
//     */
//    public function restore($id);
//
//    /**
//     * @param  $id
//     * @param  $status
//     * @return mixed
//     */
//    public function mark($id, $status);
//
//    /**
//     * @param  $id
//     * @param  $input
//     * @return mixed
//     */
//    public function updatePassword($id, $input);
}
