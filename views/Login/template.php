<?php

if ($result['auth']) {
	?>
    <div class="login">
            <button type="submit" name="logout" id="logout" class="button positive">
                Logout
            </button>
            </p>
    </div>
	<?
} else {
	?>
    <div class="login">

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
                <button type="submit" id="login" class="button positive">
                    Login
                </button>
            </p>

    </div>
	<?
}

?>

<script type="text/javascript">
    let param = <?=json_encode($result['request'])?>;
</script>