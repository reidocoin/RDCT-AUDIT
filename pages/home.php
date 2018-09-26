<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Estatisticas 4stake.com</h2>
        </div>

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-orange hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">person_add</i>
                    </div>
                    <div class="content">
                        <div class="text">Usuarios ativos</div>
                        <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-pink hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">playlist_add_check</i>
                    </div>
                    <div class="content">
                        <div class="text">Masternodes Ativos</div>
                        <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-cyan hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">https</i>
                    </div>
                    <div class="content">
                        <div class="text">Moedas em Captação</div>
                        <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-light-green hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">attach_money</i>
                    </div>
                    <div class="content">
                        <div class="text">FEE recebidas</div>
                        <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>

        </div>
        <!-- #END# Widgets -->
    </div>
</section>
<?php
$rss = new DOMDocument();
$rss->load('https://rdctoken.io/blog/feed/');
$feed = array();
foreach ($rss->getElementsByTagName('item') as $node) {
    $item = array (
        'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
        'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
        'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
        'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
    );
    array_push($feed, $item);
}
$limit = 6;

?>
<section class="content">
    <div class="container-fluid">
        <!-- Basic Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Ultimas noticias em nosso blog
                            <small>Ultimos post em nosso blog, clique aqui e veja todos nossos post's <a href="https://www.rdctoken.io/blog">RDCToken.io/Blog</a></small>
                        </h2>

                    </div>
                    <div class="body table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Noticia</th>
                                <th>Data</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            for($x=1;$x<$limit;$x++) {
                                $title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
                                $link = $feed[$x]['link'];
                                $description = $feed[$x]['desc'];
                                $date = date('l F d, Y', strtotime($feed[$x]['date']));

                                echo '<tr>
                                    <th scope="row">'.$x.'</th>
                                    <td><p><strong><a href="'.$link.'" title="'.$title.'">'.$title.'</a></strong><br /><p>'.$description.'</p></td>
                                    <td><small><em> '.$date.'</em></small></p></td>
                                </tr>
                                
                                ';

                            }
                            ?>
a                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
