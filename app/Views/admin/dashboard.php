<?= $this->extend('layout/admin') ?>


<?= $this->section('cssLinks') ?>

<style>
    .dashboardView {
        text-align: center;
        padding: 35px;
        font-size: 20px;
    }
</style>

<?= $this->endSection() ?>




<?= $this->section('content') ?>


<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="far fa-chart-bar"></i>
                            Site Status
                        </h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="bar-chart" style="height: 300px;"></div>
                        <div class="row">
                            <div class="col-md-4 dashboardView">
                                <div>All-time views</div>
                                <div><b><?= $totalvisit ?></b></div>
                            </div>
                            <div class="col-md-4 dashboardView">
                                <div>Views today</div>
                                <div><b><?= $todayview ?></b></div>
                            </div>
                            <div class="col-md-4 dashboardView">
                                <div>Best overall day</div>
                                <div><b> <?php if (isset($bestoverall)) {
                                    echo $bestoverall["total"];
                                } ?></b></div>
                                <div>
                                    <?php if (isset($bestoverall)) {
                                        echo date("d M,Y", strtotime($bestoverall["date"]));
                                    } ?>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body-->
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">

                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <th>Recent News</th>
                                </tr>
                            </thead>
                            <?php foreach ($recent as $re) { ?>
                                <tr>
                                    <td>
                                        <!-- <a href="<?= base_url("admin/admin/post_edit/" . $re["id"]) ?>"><?= $re["title"] ?> -->
                                        <?php
                                        $d = $re['date'];
                                        $d_create = date_create($d);
                                        $date = date_format($d_create, $permalink);
                                        $text = $re["seo_url"];
                                        ?>
                                        <a href="<?= base_url() . "/" . $date . "/" . $text ?>"
                                            target="_blank"><?= $re['title'] ?></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>

                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <th>Top News</th>

                                    <!-- <th>Views</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($top as $t) { ?>
                                    <tr>
                                        <td>
                                            <!-- <a href="<?php //echo base_url("admin/admin/post_edit/" . $t["id"]) ?>"><?php //echo $t["title"] ?></a> -->
                                            <?php
                                            $d = $t['date'];
                                            $d_create = date_create($d);
                                            $date = date_format($d_create, $permalink);
                                            $text = $t['seo_url'];
                                            ?>
                                            <a href="<?= base_url() . "/" . $date . "/" . $text ?>"
                                                target="_blank"><?= $t['title'] ?></a>
                                        </td>
                                        <td>
                                            <?php // echo $t["visit"] ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <th>Blocked Ip</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($blockedips as $bip) { ?>
                                    <tr>
                                        <td>
                                            <?= $bip["ip"] ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td>
                                        <a href="<?= base_url("admin/ipblocklist") ?>">More Detail</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>




<?= $this->endSection() ?>


<?= $this->section('scriptLinks') ?>

    <script>
        $(function () {
            var bar_data = {
                data: <?= (isset($dailyVisit["y"]) ? json_encode($dailyVisit["y"]) : "") ?>,
                bars: {
                    show: true
                }
            }
            $.plot('#bar-chart', [bar_data], {
                grid: {
                    borderWidth: 1,
                    borderColor: '#f3f3f3',
                    tickColor: '#f3f3f3'
                },
                series: {
                    bars: {
                        show: true,
                        barWidth: 0.5,
                        align: 'center',
                    },
                },
                colors: ['#3c8dbc'],
                xaxis: {
                    ticks: <?= (isset($dailyVisit["y"]) ? json_encode($dailyVisit["x"]) : "") ?>
                }
            })
        });
    </script>

<?= $this->endSection() ?>