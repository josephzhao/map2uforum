<?php

namespace Map2u\ForumBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class Map2uForumBundle extends Bundle {

    public function boot() {
        $twig = $this->container->get('twig');

        $twig->addGlobal(
                'map2u_forum', array(
            'seo' => array(
                'title_length' => $this->container->getParameter('map2u_forum.seo.title_length'),
            ),
            'forum' => array(
                'admin' => array(
                    'create' => array(
                        'layout_template' => $this->container->getParameter('map2u_forum.forum.admin.create.layout_template'),
                        'form_theme' => $this->container->getParameter('map2u_forum.forum.admin.create.form_theme'),
                    ),
                    'delete' => array(
                        'layout_template' => $this->container->getParameter('map2u_forum.forum.admin.delete.layout_template'),
                        'form_theme' => $this->container->getParameter('map2u_forum.forum.admin.delete.form_theme'),
                    ),
                    'edit' => array(
                        'layout_template' => $this->container->getParameter('map2u_forum.forum.admin.edit.layout_template'),
                        'form_theme' => $this->container->getParameter('map2u_forum.forum.admin.edit.form_theme'),
                    ),
                    'list' => array(
                        'layout_template' => $this->container->getParameter('map2u_forum.forum.admin.list.layout_template'),
                    ),
                ),
            ),
            'category' => array(
                'admin' => array(
                    'create' => array(
                        'layout_template' => $this->container->getParameter('map2u_forum.category.admin.create.layout_template'),
                        'form_theme' => $this->container->getParameter('map2u_forum.category.admin.create.form_theme'),
                    ),
                    'delete' => array(
                        'layout_template' => $this->container->getParameter('map2u_forum.category.admin.delete.layout_template'),
                        'form_theme' => $this->container->getParameter('map2u_forum.category.admin.delete.form_theme'),
                    ),
                    'edit' => array(
                        'layout_template' => $this->container->getParameter('map2u_forum.category.admin.edit.layout_template'),
                        'form_theme' => $this->container->getParameter('map2u_forum.category.admin.edit.form_theme'),
                    ),
                    'list' => array(
                        'layout_template' => $this->container->getParameter('map2u_forum.category.admin.list.layout_template'),
                    ),
                ),
                'user' => array(
                    'last_post_datetime_format' => $this->container->getParameter('map2u_forum.category.user.last_post_datetime_format'),
                    'index' => array(
                        'layout_template' => $this->container->getParameter('map2u_forum.category.user.index.layout_template'),
                    ),
                    'show' => array(
                        'layout_template' => $this->container->getParameter('map2u_forum.category.user.show.layout_template'),
                    ),
                ),
            ),
            'board' => array(
                'admin' => array(
                    'create' => array(
                        'layout_template' => $this->container->getParameter('map2u_forum.board.admin.create.layout_template'),
                        'form_theme' => $this->container->getParameter('map2u_forum.board.admin.create.form_theme'),
                    ),
                    'delete' => array(
                        'layout_template' => $this->container->getParameter('map2u_forum.board.admin.delete.layout_template'),
                        'form_theme' => $this->container->getParameter('map2u_forum.board.admin.delete.form_theme'),
                    ),
                    'edit' => array(
                        'layout_template' => $this->container->getParameter('map2u_forum.board.admin.edit.layout_template'),
                        'form_theme' => $this->container->getParameter('map2u_forum.board.admin.edit.form_theme'),
                    ),
                    'list' => array(
                        'layout_template' => $this->container->getParameter('map2u_forum.board.admin.list.layout_template'),
                    ),
                ),
                'user' => array(
                    'show' => array(
                        'layout_template' => $this->container->getParameter('map2u_forum.board.user.show.layout_template'),
                        'topic_title_truncate' => $this->container->getParameter('map2u_forum.board.user.show.topic_title_truncate'),
                        'first_post_datetime_format' => $this->container->getParameter('map2u_forum.board.user.show.first_post_datetime_format'),
                        'last_post_datetime_format' => $this->container->getParameter('map2u_forum.board.user.show.last_post_datetime_format'),
                        'topics_per_page' => $this->container->getParameter('map2u_forum.board.user.show.topics_per_page'),
                    ),
                ),
            ),
            'topic' => array(
                'moderator' => array(
                    'change_board' => array(
                        'layout_template' => $this->container->getParameter('map2u_forum.topic.moderator.change_board.layout_template'),
                        'form_theme' => $this->container->getParameter('map2u_forum.topic.moderator.change_board.form_theme'),
                    ),
                    'delete' => array(
                        'layout_template' => $this->container->getParameter('map2u_forum.topic.moderator.delete.layout_template'),
                        'form_theme' => $this->container->getParameter('map2u_forum.topic.moderator.delete.form_theme'),
                    ),
                ),
                'user' => array(
                    'show' => array(
                        'layout_template' => $this->container->getParameter('map2u_forum.topic.user.show.layout_template'),
                        'closed_datetime_format' => $this->container->getParameter('map2u_forum.topic.user.show.closed_datetime_format'),
                        'deleted_datetime_format' => $this->container->getParameter('map2u_forum.topic.user.show.deleted_datetime_format'),
                        'posts_per_page' => $this->container->getParameter('map2u_forum.topic.user.show.posts_per_page'),
                    ),
                    'create' => array(
                        'layout_template' => $this->container->getParameter('map2u_forum.topic.user.create.layout_template'),
                        'form_theme' => $this->container->getParameter('map2u_forum.topic.user.create.form_theme'),
                    ),
                    'reply' => array(
                        'layout_template' => $this->container->getParameter('map2u_forum.topic.user.reply.layout_template'),
                        'form_theme' => $this->container->getParameter('map2u_forum.topic.user.reply.form_theme'),
                    ),
                ),
            ),
            'post' => array(
                'moderator' => array(
                    'unlock' => array(
                        'layout_template' => $this->container->getParameter('map2u_forum.post.moderator.unlock.layout_template'),
                        'form_theme' => $this->container->getParameter('map2u_forum.post.moderator.unlock.form_theme'),
                    ),
                ),
                'user' => array(
                    'show' => array(
                        'layout_template' => $this->container->getParameter('map2u_forum.post.user.show.layout_template'),
                    ),
                    'edit' => array(
                        'layout_template' => $this->container->getParameter('map2u_forum.post.user.edit.layout_template'),
                        'form_theme' => $this->container->getParameter('map2u_forum.post.user.edit.form_theme'),
                    ),
                    'delete' => array(
                        'layout_template' => $this->container->getParameter('map2u_forum.post.user.delete.layout_template'),
                        'form_theme' => $this->container->getParameter('map2u_forum.post.user.delete.form_theme'),
                    ),
                ),
            ),
            'item_post' => array(
                'created_datetime_format' => $this->container->getParameter('map2u_forum.item_post.created_datetime_format'),
                'edited_datetime_format' => $this->container->getParameter('map2u_forum.item_post.edited_datetime_format'),
                'deleted_datetime_format' => $this->container->getParameter('map2u_forum.item_post.deleted_datetime_format'),
            ),
            'subscription' => array(
                'list' => array(
                    'layout_template' => $this->container->getParameter('map2u_forum.subscription.list.layout_template'),
                    'topics_per_page' => $this->container->getParameter('map2u_forum.subscription.list.topics_per_page'),
                ),
            ),
                )
        ); // End Twig Globals.
    }

}
