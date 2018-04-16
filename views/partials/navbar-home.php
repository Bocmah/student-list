<nav class="uk-navbar-container uk-margin-small-bottom" uk-navbar>
        <div class="uk-navbar-left uk-margin-left">
            <ul class="uk-navbar-nav">
                <li>
                    <?php if ($isAuth): ?>
                       <a href="profile">Профиль</a>
                    <?php else: ?>
                        <a href="register">Регистрация</a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
</nav>
