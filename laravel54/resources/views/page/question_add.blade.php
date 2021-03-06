<div class="question-add container" ng-controller="QuestionAddController">
    <div class="card">
        <form ng-submit="Question.add()" name="question_add_form">
            <div class="input-group">
                <label>问题标题</label>
                <input type="text" ng-model="Question.new_question.title" name="title" ng-minlength="5"
                       ng-maxlength="255" required>
            </div>
            <div class="input-group">
                <label>问题描述</label>
                <textarea type="text" ng-model="Question.new_question.desc" name="desc"></textarea>
            </div>
            <div class="input-group">
                <button type="submit" ng-disabled="question_add_form.$invalid" class="primary">提交</button>
            </div>
        </form>
    </div>
</div>