<?php

namespace common\rbac;

/**
 * Permissions class
 *
 * @author Alex Golenko <alekseimell5644@gmail.com>
 */

class Permissions
{
    /**
     * role for view all posts
     */
    const MANAGE_POST = 'managePost';

    /**
     * role for view one post
     */
    const VIEW_POST = 'viewPost';

    /**
     * role for update post
     */
    const UPDATE_POST = 'updatePost';

    /**
     * role for create post
     */
    const CREATE_POST = 'createPost';

    /**
     * role for delete post
     */
    const DELETE_POST = 'deletePost';

    /**
     * role for update own post
     */
    const UPDATE_OWN_POST = 'updateOwnPost';
}