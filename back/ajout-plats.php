<?php require_once '../controllers/controllerAjout-plats.php'; ?>
<?php include 'header_back.php'; ?>
<!-- CONTENT PAGE -->
<div class="container marginTop">
    <div class="row justify-content-center" id="margAjoutPlats">
        <div class="col-md-8">
            <?php if ($addSuccess) { ?>
                <p>Plats bien ajouté !</p>
                <a href="ajout-plats.php" class="btn btn-primary btnHomeBack">Ajouter un nouveau plat</a>
                <a href="listplats.php" class="btn btn-amber btnHomeBack">Liste des plats</a>
            <?php } else { ?>
                <form class="form" name="form" id="dishesForm" method="post" enctype="multipart/form-data">
                    <div class="card" id="addDishes">
                        <!-- Card header -->
                        <div class="card-header headerCard" role="tab" id="heading1" align="center">
                            <h2 class="mb-0 mt-3">Ajout plats</h2>
                        </div>
                        <div class="card-body pt-0 lighten-1">
                            <div class="form-row" id="namePrice">
                                <div class="md-form col-md-6">
                                    <label for="inputNameDishes">Nom&nbsp;
                                        <span class="red-text">* <?= isset($arrayError['nameDishiesErr']) ? $arrayError['nameDishiesErr'] : ''; ?></span>
                                    </label>
                                    <input class="form-control" id="inputNameDishes" type="text" name="inputNameDishes" value="<?= count($arrayError) != 0 ? $dishesOBJ->dishes_name : ''; ?>" />
                                </div>
                                <div class="md-form col-md-6">
                                    <label for="inputPrice">Prix&nbsp;
                                        <span class="red-text">* <?= isset($arrayError['priceErr']) ? $arrayError['priceErr'] : ''; ?></span>
                                    </label>
                                    <input class="form-control" id="inputPrice" type="text" name="inputPrice" value="<?= count($arrayError) != 0 ? $dishesOBJ->dishes_price : ''; ?>" />
                                </div>
                            </div>
                            <div class="form-row" id="catSouscatOrdi">
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
                            <div class="form-row" id="selectCatSouscatOrdi">
                                <div class="md-form col-md-6">
                                    <select class="browser-default custom-select" id="selectCat" name="selectCat">
                                        <option value="">Choix de la catégorie</option>
                                        <option value="1">Entrée</option>
                                        <option value="2">Plat</option>
                                        <option value="3">Dessert</option>
                                    </select>
                                </div>
                                <div class="md-form col-md-6">
                                    <select class="browser-default custom-select" id="selectSubCat" name="selectSubCat">
                                        <option value="">Choix de la sous-catégorie</option>
                                        <option value="1">Végétarien</option>
                                        <option value="2">Viande</option>
                                        <option value="3">Volaille</option>
                                        <option value="4">Poisson</option>
                                        <option value="5">Aucun</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row" id="catSouscatResponsiveMobile" style="display: none;">
                                <div class="md-form col-md-6">
                                    <label for="selectCat" id="labelCatResponsiveMobile">Catégories&nbsp;
                                        <span class="red-text">* <?= isset($arrayError['catErr']) ? $arrayError['catErr'] : ''; ?></span>
                                    </label>
                                </div>
                                <div class="md-form col-md-6">
                                    <select class="browser-default custom-select" id="selectCat" name="selectCat">
                                        <option value="">Choix de la catégorie</option>
                                        <option value="1">Entrée</option>
                                        <option value="2">Plat</option>
                                        <option value="3">Dessert</option>
                                    </select>
                                </div>
                                <div class="md-form col-md-6">
                                    <label for="selectSubCat" id="labelSouscatResponsiveMobile">Sous-catégories&nbsp;
                                        <span class="red-text">* <?= isset($arrayError['subCatErr']) ? $arrayError['subCatErr'] : ''; ?></span>
                                    </label>
                                </div>
                                <div class="md-form col-md-6">
                                    <select class="browser-default custom-select" id="selectSubCat" name="selectSubCat">
                                        <option value="">Choix de la sous-catégorie</option>
                                        <option value="1">Végétarien</option>
                                        <option value="2">Viande</option>
                                        <option value="3">Volaille</option>
                                        <option value="4">Poisson</option>
                                        <option value="5">Aucun</option>
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
                                    <textarea class="form-control" id="inputDesc" name="inputDesc" value="<?= count($arrayError) != 0 ? $dishesOBJ->dishes_description : ''; ?>" /></textarea>
                                </div>
                            </div>
                        </div>
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
