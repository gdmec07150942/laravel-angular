<div class="container" ng-controller="SignupController">
    <div class="row">
        <div class="col-md-6 col-md-offset-3" style="margin-top: 50px;">
            <div class="well bs-component">
                <form name="signup_form" ng-submit="User.signup()" class="form-horizontal">
                    <fieldset>
                        <legend class="text-center">注册</legend>
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1"><label for="name" class="control-label">用户名</label>
                                <input id="name" type="text" name="username" value="" placeholder="请输入用户名"
                                       required autofocus="autofocus" class="form-control"
                                       ng-model="User.signup_data.username" ng-minlength="3" ng-maxlength="20"
                                       ng-model-options="{debounce:500}">
                                <div class="" ng-if="signup_form.username.$touched">
                                    <div ng-if="signup_form.username.$error.required">用户名为必填项</div>
                                    <div ng-if="signup_form.username.$error.minlength||signup_form.username.$error.maxlength">
                                        用户名的长度必须在3-20位之间
                                    </div>
                                    <div ng-if="User.signup_username_exists">
                                        用户名已存在
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1"><label for="email" class="control-label">邮箱地址</label>
                                <input id="email" type="email" name="email" value="" placeholder="请输入邮箱"
                                       required class="form-control" ng-model="User.signup_data.email">
                                <div class="" ng-if="signup_form.email.$touched">
                                    <div ng-if="signup_form.email.$error.required">邮箱地址为必填项</div>
                                    <div ng-if="User.signup_email_exists">
                                        邮箱已存在
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1"><label for="password"
                                                                          class="control-label">密码</label> <input
                                        id="password" type="password" name="password" placeholder="请输入密码"
                                        required class="form-control" ng-model="User.signup_data.password"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1"><label for="password-confirm" class="control-label">确认密码</label>
                                <input id="password-confirm" type="password" name="password_confirmation"
                                       placeholder="请输入确认密码" required class="form-control"
                                       ng-model="User.signup_data.password_confirmation"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-1">
                                <button type="submit" class="btn btn-primary form-control"
                                        ng-disabled="signup_form.$invalid">
                                    注册
                                </button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2 text-center"><a href="#!/login"
                                                                                 class="btn btn-link">
                                    您已经有账号？点击此处
                                </a></div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
{{--
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
</div>--}}
