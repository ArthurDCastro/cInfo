<link rel="stylesheet" href="assets/vendor/front/semantic/components/feed.css">
<script rel="stylesheet" src="assets/front_end/js/feed.js"></script>
<script rel="stylesheet" src="assets/charts/feed.js"></script>
<br><br><br><br>
<div class="ui container segment" id="article">
    <div class="ui feed">

        <div class="event">
            <div class="label">
                <img src="assets/files/img/avatar/small/joe.jpg">
            </div>
            <div class="content">
                <div class="summary">
                    <a>Joe Henderson</a> posted on his page
                    <div class="date">
                        3 days ago
                    </div>
                </div>
                <div class="extra text">
                    <pre>
                        <?php var_dump($url) ?>
                    </pre>
                    <div id="piechart_div"></div>
                </div>
                <div class="meta">
                    <a class="like">
                        <i class="like icon"></i> 5 Likes
                    </a>
                    <a class="comments comentarios" id="comenClick1">
                        <i class="comments icon"></i> 4 Comentarios
                    </a>
                </div>
                <div class="ui cookie nag comentarios" style="z-index: inherit" id="comen1">
                    <i class="close icon black"></i>
                    <div class="ui small comments">
                        <h4 class="ui dividing header">Comments</h4>
                        <div class="comment">
                            <a class="avatar">
                                <img src="assets/files/img/avatar/small/matt.jpg" style=" height: auto">
                            </a>
                            <div class="content">
                                <a class="author">Matt</a>
                                <div class="metadata">
                                    <span class="date">Today at 5:42PM</span>
                                </div>
                                <div class="text">
                                    How artistic!
                                </div>
                                <div class="actions">
                                    <a class="reply">Reply</a>
                                </div>
                            </div>
                        </div>
                        <div class="comment">
                            <a class="avatar">
                                <img src="assets/files/img/avatar/small/elliot.jpg" style=" height: auto">
                            </a>
                            <div class="content">
                                <a class="author">Elliot Fu</a>
                                <div class="metadata">
                                    <span class="date">Yesterday at 12:30AM</span>
                                </div>
                                <div class="text">
                                    <p>This has been very useful for my research. Thanks as well!</p>
                                </div>
                                <div class="actions">
                                    <a class="reply">Reply</a>
                                </div>
                            </div>
                            <div class="comments">
                                <div class="comment">
                                    <a class="avatar">
                                        <img src="assets/files/img/avatar/small/jenny.jpg" style=" height: auto">
                                    </a>
                                    <div class="content">
                                        <a class="author">Jenny Hess</a>
                                        <div class="metadata">
                                            <span class="date">Just now</span>
                                        </div>
                                        <div class="text">
                                            Elliot you are always so right :)
                                        </div>
                                        <div class="actions">
                                            <a class="reply">Reply</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="comment">
                            <a class="avatar">
                                <img src="assets/files/img/avatar/small/joe.jpg" style=" height: auto">
                            </a>
                            <div class="content">
                                <a class="author">Joe Henderson</a>
                                <div class="metadata">
                                    <span class="date">5 days ago</span>
                                </div>
                                <div class="text">
                                    Dude, this is awesome. Thanks so much
                                </div>
                                <div class="actions">
                                    <a class="reply">Reply</a>
                                </div>
                            </div>
                        </div>
                        <form class="ui reply form">
                            <div class="field">
                                <textarea></textarea>

                            </div>
                            <div class="ui blue labeled submit icon button">
                                <i class="icon edit"></i> Add Reply
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="event">
            <div class="label">
                <img src="assets/files/img/avatar/small/helen.jpg">
            </div>
            <div class="content">
                <div class="summary">
                    <a>Helen Troy</a> added <a>2 new illustrations</a>
                    <div class="date">
                        4 days ago
                    </div>
                </div>
                <div class="extra images">
                    <div id="barchart_div"></div>
                    <a><img src="assets/files/img/image.png"></a>
                    <a><img src="assets/files/img/image.png"></a>
                </div>
                <div class="meta">
                    <a class="like">
                        <i class="like icon"></i> 1 Like
                        <a class="comments comentarios" id="comenClick2">
                            <i class="comments icon"></i> 4 Comentarios
                        </a>
                </div>
                <div class="ui cookie nag comentarios" style="z-index: inherit" id="comen2">
                    <i class="close icon black"></i>
                    <div class="ui small comments">
                        <h4 class="ui dividing header">Comments</h4>
                        <div class="comment">
                            <a class="avatar">
                                <img src="assets/files/img/avatar/small/matt.jpg" style=" height: auto">
                            </a>
                            <div class="content">
                                <a class="author">Matt</a>
                                <div class="metadata">
                                    <span class="date">Today at 5:42PM</span>
                                </div>
                                <div class="text">
                                    How artistic!
                                </div>
                                <div class="actions">
                                    <a class="reply">Reply</a>
                                </div>
                            </div>
                        </div>
                        <div class="comment">
                            <a class="avatar">
                                <img src="assets/files/img/avatar/small/elliot.jpg" style=" height: auto">
                            </a>
                            <div class="content">
                                <a class="author">Elliot Fu</a>
                                <div class="metadata">
                                    <span class="date">Yesterday at 12:30AM</span>
                                </div>
                                <div class="text">
                                    <p>This has been very useful for my research. Thanks as well!</p>
                                </div>
                                <div class="actions">
                                    <a class="reply">Reply</a>
                                </div>
                            </div>
                            <div class="comments">
                                <div class="comment">
                                    <a class="avatar">
                                        <img src="assets/files/img/avatar/small/jenny.jpg" style=" height: auto">
                                    </a>
                                    <div class="content">
                                        <a class="author">Jenny Hess</a>
                                        <div class="metadata">
                                            <span class="date">Just now</span>
                                        </div>
                                        <div class="text">
                                            Elliot you are always so right :)
                                        </div>
                                        <div class="actions">
                                            <a class="reply">Reply</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="comment">
                            <a class="avatar">
                                <img src="assets/files/img/avatar/small/joe.jpg" style=" height: auto">
                            </a>
                            <div class="content">
                                <a class="author">Joe Henderson</a>
                                <div class="metadata">
                                    <span class="date">5 days ago</span>
                                </div>
                                <div class="text">
                                    Dude, this is awesome. Thanks so much
                                </div>
                                <div class="actions">
                                    <a class="reply">Reply</a>
                                </div>
                            </div>
                        </div>
                        <form class="ui reply form">
                            <div class="field">
                                <textarea></textarea>

                            </div>
                            <div class="ui blue labeled submit icon button">
                                <i class="icon edit"></i> Add Reply
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="event">
            <div class="label">
                <img src="assets/files/img/avatar/small/justen.jpg">
            </div>
            <div class="content">
                <div class="summary">
                    <a>Justen Kitsune</a> added <a>2 new photos</a> of you
                    <div class="date">
                        4 days ago
                    </div>
                </div>
                <div class="extra images">
                    <div id="donutchart_div"></div>
                    <a><img src="assets/files/img/image.png"></a>
                    <a><img src="assets/files/img/image.png"></a>
                </div>
                <div class="meta">
                    <a class="like">
                        <i class="like icon"></i> 41 Likes
                        <a class="comments comentarios" id="comenClick4">
                            <i class="comments icon"></i> 4 Comentarios
                        </a>
                </div>
                <div class="ui cookie nag comentarios" style="z-index: inherit" id="comen4">
                    <i class="close icon black"></i>
                    <div class="ui small comments">
                        <h4 class="ui dividing header">Comments</h4>
                        <div class="comment">
                            <a class="avatar">
                                <img src="assets/files/img/avatar/small/matt.jpg" style=" height: auto">
                            </a>
                            <div class="content">
                                <a class="author">Matt</a>
                                <div class="metadata">
                                    <span class="date">Today at 5:42PM</span>
                                </div>
                                <div class="text">
                                    How artistic!
                                </div>
                                <div class="actions">
                                    <a class="reply">Reply</a>
                                </div>
                            </div>
                        </div>
                        <div class="comment">
                            <a class="avatar">
                                <img src="assets/files/img/avatar/small/elliot.jpg" style=" height: auto">
                            </a>
                            <div class="content">
                                <a class="author">Elliot Fu</a>
                                <div class="metadata">
                                    <span class="date">Yesterday at 12:30AM</span>
                                </div>
                                <div class="text">
                                    <p>This has been very useful for my research. Thanks as well!</p>
                                </div>
                                <div class="actions">
                                    <a class="reply">Reply</a>
                                </div>
                            </div>
                            <div class="comments">
                                <div class="comment">
                                    <a class="avatar">
                                        <img src="assets/files/img/avatar/small/jenny.jpg" style=" height: auto">
                                    </a>
                                    <div class="content">
                                        <a class="author">Jenny Hess</a>
                                        <div class="metadata">
                                            <span class="date">Just now</span>
                                        </div>
                                        <div class="text">
                                            Elliot you are always so right :)
                                        </div>
                                        <div class="actions">
                                            <a class="reply">Reply</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="comment">
                            <a class="avatar">
                                <img src="assets/files/img/avatar/small/joe.jpg" style=" height: auto">
                            </a>
                            <div class="content">
                                <a class="author">Joe Henderson</a>
                                <div class="metadata">
                                    <span class="date">5 days ago</span>
                                </div>
                                <div class="text">
                                    Dude, this is awesome. Thanks so much
                                </div>
                                <div class="actions">
                                    <a class="reply">Reply</a>
                                </div>
                            </div>
                        </div>
                        <form class="ui reply form">
                            <div class="field">
                                <textarea></textarea>

                            </div>
                            <div class="ui blue labeled submit icon button">
                                <i class="icon edit"></i> Add Reply
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>