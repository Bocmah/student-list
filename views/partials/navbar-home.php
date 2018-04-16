<div class="uk-container uk-container-expand uk-margin-small-bottom">
    <nav uk-navbar>
            <div class="uk-navbar-left">
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
</div>
