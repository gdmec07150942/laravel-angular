<div ng-controller="HomeController" class="home card container">
    <h1>最新动态</h1>
    <div class="hr"></div>
    <div class="item-set">
        <div class="feed item claerfix" ng-repeat="item in Timeline.data">
            <div class="vote" ng-if="item.question_id">
                <div class="up" ng-click="Timeline.vote({id:item.id,vote:1})">赞[:item.upvote_count:]</div>
                <div class="down" ng-click="Timeline.vote({id:item.id,vote:2})">踩[:item.downvote_count:]</div>
            </div>
            <div class="feed-item-content">
                <div ng-if="item.question_id" class="content-act">[:item.user.username:]添加了回答</div>
                <div ng-if="!item.question_id" class="content-act">[:item.user.username:]添加了提问</div>
                <div class="title">[:item.title:]</div>
                <div class="content-owner">[:item.user.username:]
                    <span class="desc">[:item.desc:]</span></div>
                <div class="content-main">
                    [:item.content:]  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis deserunt dolorum ea eos ipsam quod ut. Non numquam quae quas rerum totam, ullam voluptatum! Eligendi maiores numquam placeat quibusdam voluptatum!
                </div>
                <div class="action-set">
                    <div class="comment">评论</div>
                </div>
                <div class="comment-block">
                    <div class="hr"></div>
                    <div class="comment-item-set">
                        <div class="rect"></div>
                        <div class="comment-item clearfix">
                            <div class="user">黎明</div>
                            <div class="comment-content">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aut
                                exercitationem laborum nisi quas quibusdam ratione rerum tenetur velit vero!
                                Culpa dignissimos dolorum ducimus eaque facilis perferendis sequi sit voluptate?
                            </div>
                        </div>
                        <div class="comment-item clearfix">
                            <div class="user">黎明</div>
                            <div class="comment-content">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aut
                                exercitationem laborum nisi quas quibusdam ratione rerum tenetur velit vero!
                                Culpa dignissimos dolorum ducimus eaque facilis perferendis sequi sit voluptate?
                            </div>
                        </div>
                        <div class="comment-item clearfix">
                            <div class="user">黎明</div>
                            <div class="comment-content">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aut
                                exercitationem laborum nisi quas quibusdam ratione rerum tenetur velit vero!
                                Culpa dignissimos dolorum ducimus eaque facilis perferendis sequi sit voluptate?
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hr"></div>
        </div>
        <div class="tac" ng-if="Timeline.pending">加载中...</div>
        <div class="tac" ng-if="Timeline.no_more_data">没有更多数据了</div>
    </div>
</div>
