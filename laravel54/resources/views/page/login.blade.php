<div class="login container" ng-controller="LoginController">
    <div class="card">
        <h1>登录</h1>
        <form name="login_form" ng-submit="User.login()">
            <div class="input-group">
                <label>用户名</label>
                <input type="text" ng-model="User.login_data.username" name="username" required>
            </div>
            <div class="input-group">
                <label>密码</label>
                <input type="password" ng-model="User.login_data.password" name="password" required>
            </div>
            <div ng-if="User.login_failed" class="input-error-set">
                用户名或密码错误
            </div>
            <div class="input-group">
                <button class="primary" ng-disabled="login_form.$invalid" type="submit">登录</button>
            </div>
        </form>
    </div>
</div>