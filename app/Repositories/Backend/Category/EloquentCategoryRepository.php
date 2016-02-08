<?php

namespace App\Repositories\Backend\Category;

use App\Exceptions\GeneralException;
use App\Models\Access\Category\Category;
use App\Repositories\Backend\Role\RoleRepositoryContract;
use App\Exceptions\Backend\Access\User\UserNeedsRolesException;
use App\Repositories\Frontend\User\UserContract as FrontendUserContract;

/**
 * Class EloquentCategoryRepository
 * @package App\Repositories\Category
 */
class EloquentCategoryRepository implements CategoryContract
{

    /**
     * @var FrontendUserContract
     */
//    protected $category;

    /**
     * @param RoleRepositoryContract $role
     * @param FrontendUserContract $user
     */
//    public function __construct(
//    )
//    {
//        $this->role = $role;
//        $this->user = $user;
//    }

    /**
     * @param  $id
     * @param  bool               $withRoles
     * @throws GeneralException
     * @return mixed
     */
    public function findOrThrowException($id, $withRoles = false)
    {
        if ($withRoles) {
            $user = Category::find($id);
        } else {
            $user = Category::withTrashed()->find($id);
        }

        if (!is_null($user)) {
            return $user;
        }

        throw new GeneralException(trans('exceptions.backend.access.users.not_found'));
    }

    /**
     * @param  $per_page
     * @return mixed
     */
    public function getCategoriesPaginated($per_page)
    {
        return Category::paginate($per_page);
    }
//
//    /**
//     * @param  $per_page
//     * @return \Illuminate\Pagination\Paginator
//     */
//    public function getDeletedCategoriesPaginated($per_page)
//    {
//        return Category::onlyTrashed()
//            ->paginate($per_page);
//    }
//
//    /**
//     * @param  string  $order_by
//     * @param  string  $sort
//     * @return mixed
//     */
//    public function getAllCategories($order_by = 'id', $sort = 'asc')
//    {
//        return Category::orderBy($order_by, $sort)
//            ->get();
//    }

    /**
     * @param  $input
     * @throws GeneralException
     * @return bool
     */
    public function create($input)
    {
        $category = $this->createCategoryStub($input);

        if ($category->save()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.access.categories.create_error'));
    }
//
//    /**
//     * @param $id
//     * @param $input
//     * @param $roles
//     * @param $permissions
//     * @return bool
//     * @throws GeneralException
//     */
//    public function update($id, $input, $roles, $permissions)
//    {
//        $user = $this->findOrThrowException($id);
//        $this->checkUserByEmail($input, $user);
//
//        if ($user->update($input)) {
//            //For whatever reason this just wont work in the above call, so a second is needed for now
//            $user->status    = isset($input['status']) ? 1 : 0;
//            $user->confirmed = isset($input['confirmed']) ? 1 : 0;
//            $user->save();
//
//            $this->checkUserRolesCount($roles);
//            $this->flushRoles($roles, $user);
//            $this->flushPermissions($permissions, $user);
//
//            return true;
//        }
//
//        throw new GeneralException(trans('exceptions.backend.access.users.update_error'));
//    }
//
//    /**
//     * @param  $id
//     * @param  $input
//     * @throws GeneralException
//     * @return bool
//     */
//    public function updatePassword($id, $input)
//    {
//        $user = $this->findOrThrowException($id);
//
//        //Passwords are hashed on the model
//        $user->password = $input['password'];
//        if ($user->save()) {
//            return true;
//        }
//
//        throw new GeneralException(trans('exceptions.backend.access.users.update_password_error'));
//    }
//
//    /**
//     * @param  $id
//     * @throws GeneralException
//     * @return bool
//     */
//    public function destroy($id)
//    {
//        if (auth()->id() == $id) {
//            throw new GeneralException(trans('exceptions.backend.access.users.cant_delete_self'));
//        }
//
//        $user = $this->findOrThrowException($id);
//        if ($user->delete()) {
//            return true;
//        }
//
//        throw new GeneralException(trans('exceptions.backend.access.users.delete_error'));
//    }
//
//    /**
//     * @param  $id
//     * @throws GeneralException
//     * @return boolean|null
//     */
//    public function delete($id)
//    {
//        $user = $this->findOrThrowException($id, true);
//
//        //Detach all roles & permissions
//        $user->detachRoles($user->roles);
//        $user->detachPermissions($user->permissions);
//
//        try {
//            $user->forceDelete();
//        } catch (\Exception $e) {
//            throw new GeneralException($e->getMessage());
//        }
//    }
//
//    /**
//     * @param  $id
//     * @throws GeneralException
//     * @return bool
//     */
//    public function restore($id)
//    {
//        $user = $this->findOrThrowException($id);
//
//        if ($user->restore()) {
//            return true;
//        }
//
//        throw new GeneralException(trans('exceptions.backend.access.users.restore_error'));
//    }
//
//    /**
//     * @param  $id
//     * @param  $status
//     * @throws GeneralException
//     * @return bool
//     */
//    public function mark($id, $status)
//    {
//        if (access()->id() == $id && $status == 0) {
//            throw new GeneralException(trans('exceptions.backend.access.users.cant_deactivate_self'));
//        }
//
//        $user         = $this->findOrThrowException($id);
//        $user->status = $status;
//
//        if ($user->save()) {
//            return true;
//        }
//
//        throw new GeneralException(trans('exceptions.backend.access.users.mark_error'));
//    }
//
//    /**
//     * Check to make sure at lease one role is being applied or deactivate user
//     *
//     * @param  $user
//     * @param  $roles
//     * @throws UserNeedsRolesException
//     */
//    private function validateRoleAmount($user, $roles)
//    {
//        //Validate that there's at least one role chosen, placing this here so
//        //at lease the user can be updated first, if this fails the roles will be
//        //kept the same as before the user was updated
//        if (count($roles) == 0) {
//            //Deactivate user
//            $user->status = 0;
//            $user->save();
//
//            $exception = new UserNeedsRolesException();
//            $exception->setValidationErrors(trans('exceptions.backend.access.users.role_needed_create'));
//
//            //Grab the user id in the controller
//            $exception->setUserID($user->id);
//            throw $exception;
//        }
//    }
//
//    /**
//     * @param  $input
//     * @param  $user
//     * @throws GeneralException
//     */
//    private function checkUserByEmail($input, $user)
//    {
//        //Figure out if email is not the same
//        if ($user->email != $input['email']) {
//            //Check to see if email exists
//            if (User::where('email', '=', $input['email'])->first()) {
//                throw new GeneralException(trans('exceptions.backend.access.users.email_error'));
//            }
//
//        }
//    }
//
//    /**
//     * @param $roles
//     * @param $user
//     */
//    private function flushRoles($roles, $user)
//    {
//        //Flush roles out, then add array of new ones
//        $user->detachRoles($user->roles);
//        $user->attachRoles($roles['assignees_roles']);
//    }
//
//    /**
//     * @param $permissions
//     * @param $user
//     */
//    private function flushPermissions($permissions, $user)
//    {
//        //Flush permissions out, then add array of new ones if any
//        $user->detachPermissions($user->permissions);
//        if (count($permissions['permission_user']) > 0) {
//            $user->attachPermissions($permissions['permission_user']);
//        }
//
//    }
//
//    /**
//     * @param  $roles
//     * @throws GeneralException
//     */
//    private function checkUserRolesCount($roles)
//    {
//        //User Updated, Update Roles
//        //Validate that there's at least one role chosen
//        if (count($roles['assignees_roles']) == 0) {
//            throw new GeneralException(trans('exceptions.backend.access.users.role_needed'));
//        }
//
//    }

    /**
     * @param  $input
     * @return mixed
     */
    private function createCategoryStub($input)
    {
        $category                = new Category();
        $category->name          = $input['name'];
        $category->code          = $input['code'];
        return $category;
    }
}
