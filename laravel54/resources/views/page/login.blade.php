<div class="container" ng-controller="LoginController">
    <div class="row">
        <div class="col-md-6 col-md-offset-3" style="margin-top: 50px;">
            <div class="well bs-component">
                <form name="login_form" ng-submit="User.login()" class="form-horizontal">
                    <fieldset>
                        <legend class="text-center">登录</legend>
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1"><label for="email"
                                                                          class="control-label">邮箱地址</label> <input
                                        id="email" type="email" name="email" value="" placeholder="请输入邮箱"
                                        required autofocus="autofocus" class="form-control"
                                        ng-model="User.login_data.email"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1"><label for="password"
                                                                          class="control-label">密码</label> <input
                                        id="password" type="password" name="password" placeholder="请输入密码"
                                        required ng-model="User.login_data.password" class="form-control"></div>
                        </div>
                        <div ng-if="User.login_failed" class="input-error-set">
                            邮箱或密码错误
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-1">
                                <div class="checkbox"><label><input type="checkbox" name="remember"> 记住我
                                    </label></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-1">
                                <button type="submit" class="btn btn-success form-control"
                                        ng-disabled="login_form.$invalid">
                                    登录
                                </button>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                            <div class="strike"><span>or</span></div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-1"><a href="https://pigjian.com/auth/github"
                                                                      class="btn btn-primary form-control"><i
                                            class="fa fa-github"></i> 登录 Github
                                </a></div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2 text-center"><a
                                        href="https://pigjian.com/password/reset" class="btn btn-link">
                                    忘记密码？
                                </a></div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<!---
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
->