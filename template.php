<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);

// Подключаем CSS-стили
$APPLICATION->SetAdditionalCSS("/build/css/common.css");
?>

<div id="barba-wrapper">
    <div class="article-list">
        <?php foreach ($arResult["ITEMS"] as $arItem): ?>
            <?php
            // Подготовка параметров для редактирования и удаления в админке
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <a class="article-item article-list__item" href="<?= $arItem["DETAIL_PAGE_URL"] ?>" data-anim="anim-3" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                <div class="article-item__background">
                    <img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" alt="<?= $arItem["NAME"] ?>" />
                </div>
                <div class="article-item__wrapper">
                    <div class="article-item__title"><?= $arItem["NAME"] ?></div>
                    <?php if ($arParams["DISPLAY_PREVIEW_TEXT"] != "N" && $arItem["PREVIEW_TEXT"]): ?>
                        <div class="article-item__content"><?= $arItem["PREVIEW_TEXT"] ?></div>
                    <?php endif; ?>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</div>