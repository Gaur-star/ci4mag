
<?= $this->extend('layout/admin') ?>


<?= $this->section('cssLinks') ?>

<style>
    .pagelist {
        list-style: none;
    }
    .menupages {
        list-style: none;
        padding: 0;
    }
    .menupages li {
        padding: 10px;
        border: 1px solid #ddd;
    }
    .pagelist li {
        padding: 10px;
        border: 1px solid #ddd;
    }
    .menupages li span {
        /* Permalink - use to edit and share this gradient: https://colorzilla.com/gradient-editor/#ff3019+0,cf0404+100;Red+3D */
        background: #ff3019;
        /* Old browsers */
        background: -moz-radial-gradient(center, ellipse cover, #ff3019 0%, #cf0404 100%);
        /* FF3.6-15 */
        background: -webkit-radial-gradient(center, ellipse cover, #ff3019 0%, #cf0404 100%);
        /* Chrome10-25,Safari5.1-6 */
        background: radial-gradient(ellipse at center, #ff3019 0%, #cf0404 100%);
        /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff3019', endColorstr='#cf0404', GradientType=1);
        /* IE6-9 fallback on horizontal gradient */

        border-radius: 32px;
        float: right;
    }



    .menupages li span a {
        padding: 7px;
        color: #fff;
        font-weight: bold;
        text-decoration: none;
    }

    .pagelist {
        height: 400px;
        overflow: scroll;
        padding: 0;
    }

    .list_section {
        padding-bottom: 15px;
    }
</style>

<?= $this->endSection() ?>




<?= $this->section('content') ?>

<div class="content-wrapper">

    <div class="container-fluid">
        <form class="form-horizontal" action="<?php echo base_url("/") . "/admin/admin/addMainMenu" ?>" method="post">
            <div class="row">
                <div class="col-8 mt-2">
                    <input type="text" class="form-control" placeholder="Enter menu name" name="menu_name" required>
                </div>
                <div class="col-2 mt-2">
                    <input type="text" class="form-control" placeholder="Order" name="menu_order" required>
                </div>
                <div class="col-2 mt-2">
                    <button type="submit" class="btn btn-info">Add Menu</button>
                </div>

            </div>

        </form>
        <hr>
        <form action="<?php echo base_url() . "/admin/admin/updateMenu" ?>" method="post">

            <div class="row">

                <div class="col-md-2">
                    <div class="col-12 text-center">
                        <h5>Menu Name</h5>
                    </div>
                    <div class="col-12">
                        <select class="form-control" name="menu">
                            <?php foreach ($menu_list as $ml) {  ?>
                                <option value="<?php echo $ml['menu_id'] ?>" <?php echo ($current == $ml['menu_id']) ? "selected" : "" ?>><?php echo $ml['menu_name'] . "(" . $ml['menu_order'] . ")" ?></option>
                            <?php    } ?>
                        </select>
                    </div>

                </div>

                <div class="col-md-4">
                    <div class="col-md-12 text-center">
                        <h5>List</h5>
                    </div>
                    <ul class="menupages">
                        <?php foreach ($menu_datalist as $md) { ?>
                            <li>
                                <?php echo $md['label']; ?>
                                <span><a href="<?php echo base_url("/") . "/admin/admin/deleteMenu/" . $md['menu_list']."/".$current; ?>">X</a></span>
                            </li>
                        <?php } ?>
                        <li style="display: flex;">
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Label" name="label">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Link" name="link">
                            </div>
                        </li>
                        <li>
                            <button class="btn btn-info btn-block"> Add Link</button>
                        </li>

                    </ul>
                </div>

                <div class="col-md-3 list_section">
                    <div class="col-md-12 text-center">
                        <h5>Category</h5>
                    </div>
                    <ul class="pagelist">

                        <?php foreach ($category_list as $cl) { ?>

                            <li>
                                <input type="checkbox" name="category_add[]" value="<?php echo $cl['id'] . "|" . $cl['categorie']; ?>"> <?php echo $cl['categorie']; ?>
                            </li>

                        <?php } ?>
                    </ul>
                    <div class="col-md-12 text-center">
                        <button class="btn btn-info" type="submit">Add To Menu</button>
                    </div>
                </div>

                <div class="col-md-3 list_section">
                    <div class="col-md-12 text-center">
                        <h5>Pages</h5>
                    </div>
                    <ul class="pagelist">

                        <?php foreach ($page_list as $pl) { ?>

                            <li><input type="checkbox" name="page_add[]" value="<?php echo $pl['id'] . "|" . $pl['title']; ?>"> <?php echo $pl['title']; ?></li>

                        <?php } ?>
                    </ul>
                    <div class="col-md-12 text-center">
                        <button class="btn btn-info" type="submit">Add To Menu</button>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>


<?= $this->section('scriptLinks') ?>


<script>
    $(document).ready(function() {

        $("select").on("change", function() {
            location.href = "<?php echo base_url("admin/admin/menupage?m=") ?>" + $(this).val();
        });
    });
</script>

<?= $this->endSection() ?>