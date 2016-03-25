<?php
global $conf;
?>
<div id="dokuwiki-control">
    <!-- PAGE ACTIONS -->
    <div id="dokuwiki__pagetools">
        <h3 class="a11y"><?php echo $lang['page_tools']; ?></h3>
        <div class="tools">
            <ul>
                <?php
                $data = array(
                    'view' => 'main',
                    'items' => array(
                        'edit' => tpl_action('edit', 1, 'li', 1, '<span>', '</span>'),
                        'revert' => tpl_action('revert', 1, 'li', 1, '<span>', '</span>'),
                        'revisions' => tpl_action('revisions', 1, 'li', 1, '<span>', '</span>'),
                        'backlink' => tpl_action('backlink', 1, 'li', 1, '<span>', '</span>'),
                        'subscribe' => tpl_action('subscribe', 1, 'li', 1, '<span>', '</span>'),
                        'top' => tpl_action('top', 1, 'li', 1, '<span>', '</span>')
                    )
                );

                // the page tools can be amended through a custom plugin hook
                $evt = new Doku_Event('TEMPLATE_PAGETOOLS_DISPLAY', $data);
                if ($evt->advise_before()) {
                    foreach ($evt->data['items'] as $k => $html)
                        echo $html;
                }
                $evt->advise_after();
                unset($data);
                unset($evt);
                ?>
            </ul>
        </div>
    </div>
    <!-- USER TOOLS -->
<?php if ($conf['useacl']): ?>
        <div id="dokuwiki__usertools">
            <h3 class="a11y"><?php echo $lang['user_tools']; ?></h3>
            <ul>
                <?php
                if (!empty($_SERVER['REMOTE_USER'])) {
                    echo '<li class="user">';
                    tpl_userinfo(); /* 'Logged in as ...' */
                    echo '</li>';
                }
                tpl_action('admin', 1, 'li');
                tpl_action('profile', 1, 'li');
                tpl_action('register', 1, 'li');
                tpl_action('login', 1, 'li');
                ?>
            </ul>
        </div>
<?php endif ?>

    <!-- SITE TOOLS -->
    <div id="dokuwiki__sitetools">
        <h3 class="a11y"><?php echo $lang['site_tools']; ?>ads</h3>
            <?php tpl_searchform(); ?>
        <ul>
            <?php
            tpl_action('recent', 1, 'li');
            tpl_action('media', 1, 'li');
            tpl_action('index', 1, 'li');
            ?>
        </ul>
    </div>
</div><!-- Dokuwiki control -->
