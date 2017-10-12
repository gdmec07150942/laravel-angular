<div class="signup container" ng-controller="SignupController">
    <div class="card">
        <h1>注册</h1>
        [:User.signup_data:]
        <form name="signup_form" ng-submit="User.signup()">
            <div class="input-group">
                <label>用户名:</label>
                <input name="username" type="text" ng-model="User.signup_data.username" ng-minlength="3"
                       ng-maxlength="20" ng-model-options="{debounce:500}" required>
                <div class="input-error-set" ng-if="signup_form.username.$touched">
                    <div ng-if="signup_form.username.$error.required">用户名为必填项</div>
                    <div ng-if="signup_form.username.$error.minlength||signup_form.username.$error.maxlength">
                        用户名的长度必须在3-20位之间
                    </div>
                    <div ng-if="User.signup_username_exists">
                        用户名已存在
                    </div>
                </div>
            </div>
            <div class="input-group">
                <label>密码:</label>
                <input name="password" type="password" ng-model="User.signup_data.password" ng-minlength="6"
                       ng-maxlength="255" required>
                <div class="input-error-set" ng-if="signup_form.password.$touched">
                    <div ng-if="signup_form.password.$error.required">密码为必填项</div>
                    <div ng-if="signup_form.password.$error.minlength||signup_form.password.$error.maxlength">
                        密码的长度必须在6-255之间
                    </div>
                </div>
            </div>
            <div class="input-group">
                <button type="submit" ng-disabled="signup_form.$invalid" class="primary">注册</button>
            </div>
        </form>
    </div>
</div>