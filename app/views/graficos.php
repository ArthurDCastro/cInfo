<link rel="stylesheet" href="assets/front_end/css/graficos.css">
<br><br>
<?php  if (!isset($dados['graficos'])): ?>

<div class="ui middle aligned center aligned grid" id="article">
    <div class="ui container">

        <div class="ui negative message">
            <div class="header">
                Ops você ainda não tem gráficos...
            </div>
            <p>Crie seus gráficos <b><a href="crie" style="color: darkred;">aqui</a></b></p>
        </div>
    </div>
</div>

<?php else: ?>

<div class="ui container segment">
    <div class="ui link cards">
        <div class="card">
            <div class="image">
                <img src="">
            </div>
            <div class="content">
                <div class="header">Matt Giampietro</div>
                <div class="meta">
                    <a>Amigos</a>
                </div>
                <div class="description">Matthew is an interior designer living in New York. </div>
            </div>
            <div class="extra content">
                <span class="right floated">Entrou em 2013 </span>
                <span><i class="user icon"></i> 75 Amigos </span>
            </div>
        </div>
        <div class="card">
            <div class="image">
                <img src="/images/avatar2/large/molly.png">
            </div>
            <div class="content">
                <div class="header">Molly</div>
                <div class="meta">
                    <span class="date">Coworker</span>
                </div>
                <div class="description">Molly is a personal assistant living in Paris. </div>
            </div>
            <div class="extra content">
                <span class="right floated">Entrou em 2011 </span>
                <span><i class="user icon"></i> 35 Amigos </span>
            </div>
        </div>
        <div class="card">
            <div class="image">
                <img src="/images/avatar2/large/elyse.png">
            </div>
            <div class="content">
                <div class="header">Elyse</div>
                <div class="meta">
                    <a>Coworker</a>
                </div>
                <div class="description">Elyse is a copywriter working in New York. </div>
            </div>
            <div class="extra content">
                <span class="right floated">Entrou em 2014 </span>
                <span><i class="user icon"></i> 151 Amigos </span>
            </div>
        </div>
    </div>
</div>

<?php endif; ?>
<br><br>
