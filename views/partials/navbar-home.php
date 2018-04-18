<header>
    <div class="uk-box-shadow-medium uk-margin-medium-bottom">
        <nav class="uk-background-primary uk-light" uk-navbar>
                <div class="uk-navbar-left">
                    <ul class="uk-navbar-nav uk-margin-left">
                        <li>
                            <?php if ($isAuth): ?>
                               <a class="uk-link-reset" href="profile">Профиль</a>
                            <?php else: ?>
                                <a href="register">Регистрация</a>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
        </nav>
    </div>
</header>
