<?php

if ($result['auth']) {
	?>
    <div class="login">
        <form id="loginForm" name="loginForm" method="post" action="">

            <button type="submit" name="logout" class="button positive">
                Logout
            </button>
            </p>
        </form>
    </div>
	<?
} else {
	?>
    <div class="login">
        <form id="loginForm" name="loginForm" method="post" action="">
			<? if (isset($result['userName'])): ?>
                <p>
                    <label for="error">auth error</label>
                </p>
			<? endif; ?>

            <p>
                <label for="username">Username</label>
                <br/>
                <input type="text" id="username" name="username"/>
            </p>
            <p>
                <label for="password">Password</label>
                <br/>
                <input type="password" id="password" name="password"/>
            </p>
            <p>
                <button type="submit" class="button positive">
                    Login
                </button>
            </p>
        </form>
    </div>
	<?
}

?>

<script type="text/javascript">
    let param = <?=json_encode($result['request'])?>;
</script>