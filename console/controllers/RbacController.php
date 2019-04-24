<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;
use common\rbac\Permissions;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        // add the rule
        $rule = new \app\rbac\AuthorRule;
        $auth->add($rule);

        // добавляем разрешение "createPost"
        $createPost              = $auth->createPermission(Permissions::CREATE_POST);
        $createPost->description = 'Create a post';
        $auth->add($createPost);

        // добавляем разрешение "updatePost"
        $updatePost              = $auth->createPermission(Permissions::UPDATE_POST);
        $updatePost->description = 'Update post';
        $auth->add($updatePost);

        //add permission "deletePost"
        $deletePost              = $auth->createPermission(Permissions::DELETE_POST);
        $deletePost->description = 'Delete post';
        $auth->add($deletePost);

        //add permission "managePost"
        $managePost              = $auth->createPermission(Permissions::MANAGE_POST);
        $managePost->description = 'Manage post';
        $auth->add($managePost);

        //add permission "viewPost"
        $viewPost              = $auth->createPermission(Permissions::VIEW_POST);
        $viewPost->description = 'View post';
        $auth->add($viewPost);

        // добавляем разрешение "updateOwnPost" и привязываем к нему правило.
        $updateOwnPost              = $auth->createPermission(Permissions::UPDATE_OWN_POST);
        $updateOwnPost->description = 'Update own post';
        $updateOwnPost->ruleName    = $rule->name;
        $auth->add($updateOwnPost);

        // "updateOwnPost" будет использоваться из "updatePost"
        $auth->addChild($updateOwnPost, $updatePost);

        // добавляем роль "author" и даём роли разрешение "createPost", "viewPost", "managePost"
        $author = $auth->createRole('author');
        $auth->add($author);
        $auth->addChild($author, $createPost);
        $auth->addChild($author, $managePost);
        $auth->addChild($author, $viewPost);
        // разрешаем "автору" обновлять его посты
        $auth->addChild($author, $updateOwnPost);


        // добавляем роль "admin" и даём роли разрешение "updatePost"
        // а также все разрешения роли "author"
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $updatePost);
        $auth->addChild($admin, $author);
        $auth->addChild($admin, $deletePost);

        // Назначение ролей пользователям. 1 и 2 это IDs возвращаемые IdentityInterface::getId()
        // обычно реализуемый в модели User.
        $auth->assign($author, 2);
        $auth->assign($admin, 1);
    }
}