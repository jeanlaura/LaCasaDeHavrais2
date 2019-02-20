<?php require_once '../controllers/controllerModifier-plats.php'; ?>
<?php include 'header_back.php'; ?>
<!-- CONTENT PAGE -->
<div class="container marginTop" id="margModifPlats">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <?php if ($updateSuccess) { ?>
                <p>Plats bien modifié !</p>
                <a href="listPlats.php" class="btn btn-primary btnHomeBack">Retour à la liste des plats</a>
            <?php } else { ?>
                <form class="form" name="form" id="dishesForm" method="post" enctype="multipart/form-data">
                    <div class="card" id="updateDishes">
                        <!-- Card header -->
                        <div class="card-header headerCard" role="tab" id="heading1" align="center">
                            <h2 class="mb-0 mt-3">Modifier un plat</h2>
                        </div>
                        <!-- Card body -->
                        <div class="card-body pt-0 lighten-1">
                            <div class="form-row" id="modifNamePrice">
                                <div class="md-form col-md-6">
                                    <label for="inputNameDishes">Nom&nbsp;
                                        <span class="red-text">* <?= isset($arrayError['nameDishiesErr']) ? $arrayError['nameDishiesErr'] : ''; ?></span>
                                    </label>
                                    <input class="form-control" id="inputNameDishes" type="text" name="inputNameDishes" value="<?= isset($_POST['inputNameDishes']) ? $_POST['inputNameDishes'] : $dishes->dishes_name ?>" />
                                </div>
                                <div class="md-form col-md-6">
                                    <label for="inputPrice">Prix&nbsp;
                                        <span class="red-text">* <?= isset($arrayError['priceErr']) ? $arrayError['priceErr'] : ''; ?></span>
                                    </label>
                                    <input class="form-control" id="inputPrice" type="text" name="inputPrice" value="<?= isset($_POST['inputPrice']) ? $_POST['inputPrice'] : $dishes->dishes_price ?>" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="md-form col-md-6">
                                    <label for="selectCat">Catégories&nbsp;
                                        <span class="red-text">* <?= isset($arrayError['catErr']) ? $arrayError['catErr'] : ''; ?></span>
                                    </label>
                                </div>
                                <div class="md-form col-md-6">
                                    <label for="selectSubCat">Sous-catégories&nbsp;
                                        <span class="red-text">* <?= isset($arrayError['subCatErr']) ? $arrayError['subCatErr'] : ''; ?></span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-row ">
                                <div class="md-form col-md-6">
                                    <select class="browser-default custom-select" id="selectCat" name="selectCat">
                                        <?php foreach ($arrayCat as $cat) { ?>
                                            <option value="<?= $cat->categories_id ?>" <?= $cat->categories_id == $dishes->categories_id ? 'selected' : '' ?>><?= $cat->categories_name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="md-form col-md-6">
                                    <select class="browser-default custom-select" id="selectSubCat" name="selectSubCat">
                                        <?php foreach ($arraySousCat as $sousCat) { ?>
                                            <option value="<?= $sousCat->subCategories_id ?>" <?= $sousCat->subCategories_id == $dishes->subCategories_id ? 'selected' : '' ?>><?= $sousCat->subCategories_name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row ">
                                <div class="md-form col-md-12">
                                    <label for="inputDesc">Description&nbsp;
                                        <span class="red-text">* <?= isset($arrayError['descErr']) ? $arrayError['descErr'] : ''; ?></span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-row ">
                                <div class="md-form col-md-12">
                                    <textarea class="form-control" id="inputDesc" name="inputDesc" /><?= isset($_POST['inputDesc']) ? $_POST['inputDesc'] : $dishes->dishes_description; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- Card footer -->
                        <div class="card-footer" role="tab" id="footing1">
                            <div class="form-row">
                                <div class="md-form col-md-12">
                                    <button type="submit" name="submit" class="btn btn-success validate">Envoyer</button>
                                    <span class="red-text" id="requiredField">* champs requis</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <?php } ?>
        </div>
    </div>
</div>
<?php include 'footer_back.php'; ?>