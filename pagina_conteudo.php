<?php
$pageId       = (int)($page['id']       ?? 0);
$pageTitle    = (string)($page['title']    ?? '');
$pageSubtitle = (string)($page['subtitle'] ?? '');
$pageSlug     = (string)($page['slug']     ?? '');
$pageActive   = (int)($page['active']      ?? 0) === 1;
$pagePublicUrl = BASE_URL . 'pagina/' . rawurlencode($pageSlug);
?>
<!-- ===================== CUSTOM CSS ====================================== -->
<style>
    /* ---------- Base & Variables -------------------------------------------- */
    :root {
        --pc-primary: #1a56db;
        --pc-primary-light: #eff6ff;
        --pc-primary-ring: rgba(26, 86, 219, .2);
        --pc-success: #057a55;
        --pc-success-bg: #def7ec;
        --pc-danger: #c81e1e;
        --pc-danger-bg: #fde8e8;
        --pc-warning: #92400e;
        --pc-warning-bg: #fdf6b2;
        --pc-gray-50: #f9fafb;
        --pc-gray-100: #f3f4f6;
        --pc-gray-200: #e5e7eb;
        --pc-gray-400: #9ca3af;
        --pc-gray-500: #6b7280;
        --pc-gray-700: #374151;
        --pc-gray-900: #111827;
        --pc-border: rgba(0, 0, 0, .08);
        --pc-radius: .75rem;
        --pc-radius-sm: .5rem;
        --pc-shadow: 0 1px 3px rgba(0, 0, 0, .08), 0 1px 2px rgba(0, 0, 0, .05);
        --pc-shadow-md: 0 4px 8px rgba(0, 0, 0, .08), 0 2px 4px rgba(0, 0, 0, .05);
    }

    /* ---------- Page Header -------------------------------------------------- */
    .pc-page-title {
        font-size: 1.35rem;
        font-weight: 700;
        color: var(--pc-gray-900);
        margin: 0;
    }

    .pc-page-subtitle {
        font-size: .9rem;
        color: var(--pc-gray-500);
        margin: .2rem 0 0;
    }

    .pc-meta-row {
        display: flex;
        flex-wrap: wrap;
        gap: .5rem;
        margin-top: .75rem;
        align-items: center;
    }

    /* ---------- Shell -------------------------------------------------------- */
    .pc-shell {
        display: grid;
        grid-template-columns: 300px minmax(0, 1fr);
        gap: 1.25rem;
        align-items: start;
        margin-bottom: 1.5rem;
    }

    @media (max-width:991px) {
        .pc-shell {
            grid-template-columns: 1fr;
        }
    }

    /* ---------- Sidebar card ------------------------------------------------- */
    .pc-sidebar-card {
        background: #fff;
        border: 1px solid var(--pc-border);
        border-radius: var(--pc-radius);
        box-shadow: var(--pc-shadow);
        overflow: hidden;
    }

    .pc-sidebar-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: .85rem 1rem;
        border-bottom: 1px solid var(--pc-border);
        background: var(--pc-gray-50);
    }

    .pc-sidebar-head-title {
        font-size: .95rem;
        font-weight: 700;
        color: var(--pc-gray-900);
        margin: 0;
        display: flex;
        align-items: center;
        gap: .45rem;
    }

    .pc-sidebar-body {
        padding: .75rem;
    }

    /* ---------- Section nav items ------------------------------------------- */
    .pc-section-list {
        display: flex;
        flex-direction: column;
        gap: .5rem;
    }

    .pc-section-item {
        display: flex;
        align-items: stretch;
        border: 1px solid var(--pc-border);
        border-radius: var(--pc-radius-sm);
        background: #fff;
        overflow: hidden;
        cursor: pointer;
        transition: border-color .15s, box-shadow .15s, background .15s;
        border-left: 3px solid transparent;
    }

    .pc-section-item:hover {
        border-color: rgba(26, 86, 219, .25);
        box-shadow: var(--pc-shadow);
    }

    .pc-section-item.is-active {
        border-color: rgba(26, 86, 219, .3);
        border-left-color: var(--pc-primary);
        background: var(--pc-primary-light);
        box-shadow: 0 0 0 3px var(--pc-primary-ring);
    }

    .pc-section-handle {
        width: 34px;
        min-width: 34px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--pc-gray-400);
        cursor: grab;
        user-select: none;
        border-right: 1px solid var(--pc-border);
    }

    .pc-section-btn {
        flex: 1 1 auto;
        min-width: 0;
        background: transparent;
        border: 0;
        text-align: left;
        padding: .7rem .75rem;
        cursor: pointer;
    }

    .pc-section-btn:focus {
        outline: 0;
    }

    .pc-section-name {
        font-size: .9rem;
        font-weight: 600;
        color: var(--pc-gray-900);
        margin: 0 0 .2rem;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .pc-section-sub {
        font-size: .8rem;
        color: var(--pc-gray-500);
        margin: 0 0 .4rem;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        min-height: 1rem;
    }

    .pc-section-meta {
        display: flex;
        flex-wrap: wrap;
        gap: .3rem;
    }

    /* ---------- Detail panel ------------------------------------------------- */
    .pc-detail-empty {
        border: 1px dashed var(--pc-gray-200);
        border-radius: var(--pc-radius);
        background: var(--pc-gray-50);
        padding: 3rem 1.5rem;
        text-align: center;
        color: var(--pc-gray-500);
    }

    .pc-detail-empty-icon {
        font-size: 2rem;
        margin-bottom: .75rem;
        color: var(--pc-gray-400);
    }

    .pc-detail-empty-title {
        font-size: 1.05rem;
        font-weight: 600;
        color: var(--pc-gray-700);
        margin-bottom: .35rem;
    }

    .pc-detail-card {
        background: #fff;
        border: 1px solid var(--pc-border);
        border-radius: var(--pc-radius);
        box-shadow: var(--pc-shadow);
        overflow: hidden;
    }

    .pc-detail-head {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 1rem;
        flex-wrap: wrap;
        padding: 1rem 1.25rem;
        border-bottom: 1px solid var(--pc-border);
        background: var(--pc-gray-50);
    }

    .pc-detail-info {
        flex: 1 1 auto;
        min-width: 0;
    }

    .pc-detail-title {
        font-size: 1.15rem;
        font-weight: 700;
        color: var(--pc-gray-900);
        margin: 0 0 .2rem;
    }

    .pc-detail-sub {
        font-size: .875rem;
        color: var(--pc-gray-500);
        margin: 0 0 .6rem;
    }

    .pc-detail-actions {
        display: flex;
        flex-wrap: wrap;
        gap: .5rem;
    }

    .pc-detail-body {
        padding: 1.25rem;
        background: var(--pc-gray-50);
    }

    /* ---------- Model blocks ------------------------------------------------- */
    .pc-model-list {
        display: flex;
        flex-direction: column;
        gap: .85rem;
    }

    .pc-model-card {
        border: 1px solid var(--pc-border);
        border-radius: var(--pc-radius);
        background: #fff;
        box-shadow: var(--pc-shadow);
        overflow: hidden;
    }

    .pc-model-head {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: .75rem;
        flex-wrap: wrap;
        padding: .9rem 1rem;
        background: #fff;
    }

    .pc-model-icon {
        width: 40px;
        min-width: 40px;
        height: 40px;
        border-radius: var(--pc-radius-sm);
        background: var(--pc-primary-light);
        color: var(--pc-primary);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        flex-shrink: 0;
    }

    .pc-model-info {
        flex: 1 1 auto;
        min-width: 0;
    }

    .pc-model-title {
        font-size: .95rem;
        font-weight: 700;
        color: var(--pc-gray-900);
        margin: 0 0 .15rem;
    }

    .pc-model-sub {
        font-size: .82rem;
        color: var(--pc-gray-500);
        margin: 0 0 .4rem;
    }

    .pc-model-meta {
        display: flex;
        flex-wrap: wrap;
        gap: .35rem;
    }

    .pc-model-desc {
        font-size: .82rem;
        color: var(--pc-gray-500);
        margin: .4rem 0 0;
    }

    .pc-model-actions {
        display: flex;
        flex-wrap: wrap;
        gap: .4rem;
        align-items: flex-start;
    }

    .pc-model-handle {
        width: 34px;
        min-width: 34px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--pc-gray-400);
        cursor: grab;
        user-select: none;
        border: 1px solid var(--pc-border);
        border-radius: var(--pc-radius-sm);
        background: var(--pc-gray-50);
        flex-shrink: 0;
    }

    .pc-model-body {
        padding: 1rem;
        border-top: 1px solid var(--pc-border);
        background: var(--pc-gray-50);
    }

    .pc-model-toolbar {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: .75rem;
        flex-wrap: wrap;
        margin-bottom: .85rem;
    }

    .pc-model-toolbar-title {
        font-size: .9rem;
        font-weight: 700;
        color: var(--pc-gray-900);
        margin: 0 0 .15rem;
    }

    .pc-model-toolbar-sub {
        font-size: .8rem;
        color: var(--pc-gray-500);
        margin: 0;
    }

    /* ---------- Text items inline list -------------------------------------- */
    .pc-text-list {
        display: flex;
        flex-direction: column;
        gap: .6rem;
    }

    .pc-text-card {
        display: flex;
        align-items: stretch;
        gap: .5rem;
        border: 1px solid var(--pc-border);
        border-radius: var(--pc-radius-sm);
        background: #fff;
        overflow: hidden;
    }

    .pc-text-handle {
        width: 32px;
        min-width: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--pc-gray-400);
        cursor: grab;
        user-select: none;
        border-right: 1px solid var(--pc-border);
        background: var(--pc-gray-50);
    }

    .pc-text-body {
        flex: 1 1 auto;
        min-width: 0;
        padding: .7rem .85rem;
    }

    .pc-text-title {
        font-size: .9rem;
        font-weight: 600;
        color: var(--pc-gray-900);
        margin: 0 0 .15rem;
    }

    .pc-text-sub {
        font-size: .8rem;
        color: var(--pc-gray-500);
        margin: 0 0 .45rem;
    }

    .pc-text-meta {
        display: flex;
        flex-wrap: wrap;
        gap: .35rem;
        margin-bottom: .5rem;
    }

    .pc-text-acts {
        display: flex;
        flex-wrap: wrap;
        gap: .4rem;
    }

    /* ---------- Folder nodes ------------------------------------------------ */
    .pc-folder-list {
        display: flex;
        flex-direction: column;
        gap: .6rem;
    }

    .pc-folder-node {
        border: 1px solid var(--pc-border);
        border-radius: var(--pc-radius-sm);
        background: #fff;
        overflow: hidden;
        transition: border-color .15s;
    }

    .pc-folder-node.is-open {
        border-color: rgba(26, 86, 219, .3);
        box-shadow: 0 0 0 3px var(--pc-primary-ring);
    }

    .pc-folder-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: .65rem;
        flex-wrap: wrap;
        padding: .7rem .9rem;
        cursor: pointer;
        user-select: none;
        transition: background .15s;
    }

    .pc-folder-head:hover {
        background: var(--pc-gray-50);
    }

    /* Use direct child (>) so parent's is-open does NOT cascade into nested subfolder heads */
    .pc-folder-node.is-open>.pc-folder-head {
        background: var(--pc-primary-light);
    }

    .pc-folder-clickable {
        display: flex;
        align-items: center;
        gap: .65rem;
        flex: 1 1 auto;
        min-width: 0;
        min-height: 0;
    }

    /* chevron rotates when open — direct child only, never affects nested subfolders */
    .pc-folder-chevron {
        color: var(--pc-gray-400);
        font-size: .8rem;
        transition: transform .2s ease;
        flex-shrink: 0;
    }

    .pc-folder-node.is-open>.pc-folder-head>.pc-folder-chevron {
        transform: rotate(90deg);
        color: var(--pc-primary);
    }

    .pc-folder-handle {
        width: 32px;
        min-width: 32px;
        height: 34px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--pc-gray-400);
        cursor: grab;
        user-select: none;
        border: 1px solid var(--pc-border);
        border-radius: .35rem;
        background: var(--pc-gray-50);
        flex-shrink: 0;
    }

    .pc-folder-handle {
        pointer-events: all;
    }

    .pc-folder-icon {
        font-size: 2rem;
        color: #f59e0b;
        flex-shrink: 0;
        transition: color .15s;
    }

    .pc-folder-node.is-open>.pc-folder-head>.pc-folder-icon {
        color: #d97706;
    }

    .pc-folder-info {
        flex: 1 1 auto;
        min-width: 0;
    }

    .pc-folder-title {
        font-size: .9rem;
        font-weight: 600;
        color: var(--pc-gray-900);
        margin: 0 0 .1rem;
    }

    .pc-folder-sub {
        font-size: .8rem;
        color: var(--pc-gray-500);
        margin: 0 0 .3rem;
        min-height: .85rem;
    }

    .pc-folder-meta {
        display: flex;
        flex-wrap: wrap;
        gap: .35rem;
    }

    .pc-folder-acts {
        display: flex;
        flex-wrap: wrap;
        gap: .4rem;
        align-items: center;
        flex-shrink: 0;
    }

    .pc-folder-body {
        border-top: 1px solid var(--pc-border);
        background: var(--pc-gray-50);
        padding: .85rem;
    }

    .pc-folder-toolbar {
        display: flex;
        justify-content: flex-end;
        flex-wrap: wrap;
        gap: .4rem;
        margin-bottom: .75rem;
    }

    .pc-subfolder-block+.pc-files-block {
        margin-top: .85rem;
    }

    .pc-block-label {
        font-size: .8rem;
        font-weight: 700;
        color: var(--pc-gray-500);
        text-transform: uppercase;
        letter-spacing: .04em;
        margin: 0 0 .5rem;
    }

    /* Nested subfolder (depth=1) slight indent */
    .pc-subfolder-block .pc-folder-list .pc-folder-node {
        background: #fff;
    }

    /* ---------- DataTables customization ------------------------------------ */
    /* ---------- DataTables customization ------------------------------------ */
    .pc-file-table-wrap {
        padding: 0;
        border: 0;
        border-radius: 0;
        background: transparent;
    }

    .pc-file-table-wrap .dataTables_wrapper {
        width: 100%;
    }

    .pc-file-table-wrap .dataTables_filter {
        text-align: right;
        margin-bottom: .75rem;
    }

    .pc-file-table-wrap .dataTables_filter input {
        border: 1px solid #ced4da;
        border-radius: .25rem;
        padding: .25rem .5rem;
        font-size: .875rem;
        margin-left: .35rem;
        background: #fff;
    }

    .pc-file-table-wrap .dataTables_length,
    .pc-file-table-wrap .dataTables_info,
    .pc-file-table-wrap .dataTables_paginate {
        font-size: .875rem;
    }

    .pc-file-table-wrap table.dataTable {
        margin: 0 !important;
        width: 100% !important;
    }

    .pc-file-table-wrap .dataTables_wrapper table.dataTable thead th {
        border-bottom: 1px solid #dee2e6;
        color: #495057;
        font-size: .875rem;
        font-weight: 600;
        text-transform: none;
        letter-spacing: 0;
        padding: .5rem .75rem;
        background: transparent;
        white-space: nowrap;
    }

    .pc-file-table-wrap .dataTables_wrapper table.dataTable tbody td {
        padding: .5rem .75rem;
        font-size: .875rem;
        vertical-align: middle;
        background: #fff;
    }

    .pc-file-table-wrap .dataTables_wrapper table.dataTable tbody tr:hover td {
        background: #f8f9fa;
    }

    .pc-file-table-wrap table.dataTable.no-footer {
        border-bottom: 1px solid #dee2e6;
    }

    .pc-file-table-wrap .dt-rowReorder-float {
        background: #fff !important;
        box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .12) !important;
        opacity: .96 !important;
    }

    .pc-file-table-wrap td.pc-reorder-td {
        cursor: grab;
        user-select: none;
        white-space: nowrap;
    }

    .pc-file-table-wrap tbody tr.dragging td.pc-reorder-td {
        cursor: grabbing;
    }

    /* ---------- Badges ------------------------------------------------------- */
    .badge-status-on {
        background: var(--pc-success-bg);
        color: var(--pc-success);
        padding: .25em .6em;
    }

    .badge-status-off {
        background: var(--pc-gray-100);
        color: var(--pc-gray-500);
        padding: .25em .6em;
    }

    .badge-type {
        background: #e0e7ff;
        color: #3730a3;
        padding: .25em .6em;
    }

    /* ---------- Empty & Spinner --------------------------------------------- */
    .pc-empty {
        border: 1px dashed var(--pc-gray-200);
        border-radius: var(--pc-radius-sm);
        background: var(--pc-gray-50);
        padding: 1.25rem;
        text-align: center;
        color: var(--pc-gray-500);
        font-size: .875rem;
    }

    .pc-spinner {
        padding: 1rem;
        color: var(--pc-gray-500);
        font-size: .875rem;
    }

    /* ---------- File button repeater ---------------------------------------- */
    .pc-btn-repeater-row {
        border: 1px solid var(--pc-border);
        border-radius: var(--pc-radius-sm);
        background: var(--pc-gray-50);
        padding: .85rem;
        margin-bottom: .6rem;
    }

    .pc-btn-repeater-row:last-child {
        margin-bottom: 0;
    }

    /* ---------- Drag sortable placeholders ---------------------------------- */
    .pc-sortable-placeholder {
        background: var(--pc-primary-light);
        border: 2px dashed rgba(26, 86, 219, .35);
        border-radius: var(--pc-radius-sm);
        visibility: visible !important;
    }

    .ui-sortable-helper {
        box-shadow: var(--pc-shadow-md) !important;
        opacity: .95 !important;
    }

    .ui-sortable-helper,
    .ui-sortable-helper * {
        transition: none !important;
        animation: none !important;
    }

    /* ---------- Misc --------------------------------------------------------- */
    .btn-icon-only {
        padding: .3rem .5rem;
    }

    .pc-divider {
        border-color: var(--pc-gray-200);
        margin: .85rem 0;
    }
</style>
<!-- ===================== HEADER ========================================= -->
<header class="header">
    <div class="row align-items-start">
        <div class="col-lg-8">
            <h1 class="title">
                <i class="fa-solid fa-layer-group mr-2" aria-hidden="true"></i>Conteúdo da Página
            </h1>
            <div class="mt-2">
                <p class="pc-page-title"><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></p>
                <?php if ($pageSubtitle !== ''): ?>
                    <p class="pc-page-subtitle"><?= htmlspecialchars($pageSubtitle, ENT_QUOTES, 'UTF-8') ?></p>
                <?php endif; ?>
                <div class="pc-meta-row">
                    <span class="badge badge-pill <?= $pageActive ? 'badge-success' : 'badge-secondary' ?>">
                        <i class="fa-solid <?= $pageActive ? 'fa-circle-check' : 'fa-circle-xmark' ?> mr-1" aria-hidden="true"></i>
                        <?= $pageActive ? 'Página ativa' : 'Página inativa' ?>
                    </span>
                    <span class="badge badge-pill badge-light border">
                        slug: <code><?= htmlspecialchars($pageSlug, ENT_QUOTES, 'UTF-8') ?></code>
                    </span>
                </div>
            </div>
        </div>
        <nav class="col-lg-4 text-right actions mt-2 mt-lg-0" aria-label="Ações rápidas">
            <a href="<?= BASE_URL ?>painel" class="btn btn-outline-secondary btn-sm">
                <i class="fas fa-tachometer-alt mr-1"></i>Dashboard
            </a>
            <a href="<?= BASE_URL ?>painel/paginas" class="btn btn-outline-secondary btn-sm">
                <i class="fa-solid fa-file-lines mr-1"></i>Páginas
            </a>
            <a href="<?= htmlspecialchars($pagePublicUrl, ENT_QUOTES, 'UTF-8') ?>" target="_blank" rel="noopener" class="btn btn-outline-primary btn-sm">
                <i class="fa-solid fa-up-right-from-square mr-1"></i>Ver página
            </a>
        </nav>
    </div>
</header>
<hr>
<!-- ===================== MASTER-DETAIL SHELL =========================== -->
<section class="pc-shell">

    <!-- SIDEBAR: sections list -->
    <aside>
        <div class="pc-sidebar-card">
            <div class="pc-sidebar-head">
                <h2 class="pc-sidebar-head-title">
                    <i class="fa-solid fa-list-check" aria-hidden="true"></i>Seções
                </h2>
                <button type="button" class="btn btn-sm btn-primary" id="btnCreateSection" title="Adicionar seção">
                    <i class="fa-solid fa-plus mr-1" aria-hidden="true"></i>Adicionar
                </button>
            </div>
            <div class="pc-sidebar-body">
                <div id="sectionsEmptyState" class="pc-empty d-none">
                    <i class="fa-solid fa-circle-info mr-1"></i>Nenhuma seção cadastrada.
                </div>
                <div id="sectionsList" class="pc-section-list"></div>
            </div>
        </div>
    </aside>

    <!-- DETAIL: section content -->
    <div id="sectionDetailPanel">
        <div class="pc-detail-empty">
            <div class="pc-detail-empty-icon"><i class="fa-solid fa-hand-pointer" aria-hidden="true"></i></div>
            <div class="pc-detail-empty-title">Selecione uma seção</div>
            <div class="small">Escolha uma seção na coluna da esquerda para gerenciar seus modelos e conteúdos.</div>
        </div>
    </div>

</section>
<!-- ===================== MODAL: CRIAR SEÇÃO ============================ -->
<div class="modal fade" id="createSectionModal" tabindex="-1" role="dialog" aria-labelledby="createSectionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form id="createSectionForm" autocomplete="off">
            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? '' ?>">
            <input type="hidden" name="page_id" value="<?= $pageId ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createSectionModalLabel"><i class="fa-solid fa-plus mr-2"></i>Adicionar seção</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="CreateSectionTitle">Título</label>
                            <input type="text" name="title" id="CreateSectionTitle" class="form-control" maxlength="255" placeholder="Ex.: Portarias">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="CreateSectionSubtitle">Subtítulo</label>
                            <input type="text" name="subtitle" id="CreateSectionSubtitle" class="form-control" maxlength="255" placeholder="Opcional">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="CreateSectionSortOrder">Ordem</label>
                            <input type="number" min="1" name="sort_order" id="CreateSectionSortOrder" class="form-control" placeholder="Auto">
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <label for="CreateSectionActive" class="mb-0 mr-3">Ativa</label>
                        <div class="checkbox-apple">
                            <input class="yep" type="checkbox" name="active" id="CreateSectionActive" value="1" checked>
                            <label for="CreateSectionActive"></label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa-solid fa-floppy-disk mr-1"></i>Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- ===================== MODAL: EDITAR SEÇÃO =========================== -->
<div class="modal fade" id="updateSectionModal" tabindex="-1" role="dialog" aria-labelledby="updateSectionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form id="updateSectionForm" autocomplete="off">
            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? '' ?>">
            <input type="hidden" name="id" id="UpdateSectionId">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateSectionModalLabel"><i class="fa-solid fa-pen-to-square mr-2"></i>Editar seção</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="UpdateSectionTitle">Título</label>
                            <input type="text" name="title" id="UpdateSectionTitle" class="form-control" maxlength="255">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="UpdateSectionSubtitle">Subtítulo</label>
                            <input type="text" name="subtitle" id="UpdateSectionSubtitle" class="form-control" maxlength="255">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="UpdateSectionSortOrder">Ordem</label>
                            <input type="number" min="1" name="sort_order" id="UpdateSectionSortOrder" class="form-control">
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <label for="UpdateSectionActive" class="mb-0 mr-3">Ativa</label>
                        <div class="checkbox-apple">
                            <input class="yep" type="checkbox" name="active" id="UpdateSectionActive" value="1">
                            <label for="UpdateSectionActive"></label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa-solid fa-rotate mr-1"></i>Atualizar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- ===================== MODAL: CRIAR MODELO =========================== -->
<div class="modal fade" id="createModelModal" tabindex="-1" role="dialog" aria-labelledby="createModelModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form id="createModelForm" autocomplete="off">
            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? '' ?>">
            <input type="hidden" name="section_id" id="CreateModelSectionId">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModelModalLabel"><i class="fa-solid fa-plus mr-2"></i>Adicionar modelo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="CreateModelType">Tipo <span class="text-danger">*</span></label>
                            <select name="model_type" id="CreateModelType" class="form-control" required>
                                <option value="">Selecione...</option>
                                <option value="text">📝 Texto</option>
                                <option value="file_list">📎 Lista de arquivos</option>
                                <option value="folder_files">📁 Pastas e arquivos</option>
                                <option value="folder_tree">🗂️ Pastas, subpastas e arquivos</option>
                            </select>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="CreateModelTitle">Título</label>
                            <input type="text" name="title" id="CreateModelTitle" class="form-control" maxlength="255" placeholder="Título do modelo">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="CreateModelSortOrder">Ordem</label>
                            <input type="number" min="1" name="sort_order" id="CreateModelSortOrder" class="form-control" placeholder="Auto">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="CreateModelSubtitle">Subtítulo</label>
                        <input type="text" name="subtitle" id="CreateModelSubtitle" class="form-control" maxlength="255" placeholder="Opcional">
                    </div>
                    <div class="form-group">
                        <label for="CreateModelDescription">Descrição</label>
                        <textarea name="description" id="CreateModelDescription" class="form-control" rows="2" placeholder="Descrição opcional"></textarea>
                    </div>
                    <div class="d-flex align-items-center">
                        <label for="CreateModelActive" class="mb-0 mr-3">Ativo</label>
                        <div class="checkbox-apple">
                            <input class="yep" type="checkbox" name="active" id="CreateModelActive" value="1" checked>
                            <label for="CreateModelActive"></label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa-solid fa-floppy-disk mr-1"></i>Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- ===================== MODAL: EDITAR MODELO ========================== -->
<div class="modal fade" id="updateModelModal" tabindex="-1" role="dialog" aria-labelledby="updateModelModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form id="updateModelForm" autocomplete="off">
            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? '' ?>">
            <input type="hidden" name="id" id="UpdateModelId">
            <input type="hidden" id="UpdateModelSectionId">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModelModalLabel"><i class="fa-solid fa-pen-to-square mr-2"></i>Editar modelo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="UpdateModelType">Tipo <span class="text-danger">*</span></label>
                            <select name="model_type" id="UpdateModelType" class="form-control" required>
                                <option value="text">📝 Texto</option>
                                <option value="file_list">📎 Lista de arquivos</option>
                                <option value="folder_files">📁 Pastas e arquivos</option>
                                <option value="folder_tree">🗂️ Pastas, subpastas e arquivos</option>
                            </select>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="UpdateModelTitle">Título</label>
                            <input type="text" name="title" id="UpdateModelTitle" class="form-control" maxlength="255">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="UpdateModelSortOrder">Ordem</label>
                            <input type="number" min="1" name="sort_order" id="UpdateModelSortOrder" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="UpdateModelSubtitle">Subtítulo</label>
                        <input type="text" name="subtitle" id="UpdateModelSubtitle" class="form-control" maxlength="255">
                    </div>
                    <div class="form-group">
                        <label for="UpdateModelDescription">Descrição</label>
                        <textarea name="description" id="UpdateModelDescription" class="form-control" rows="2"></textarea>
                    </div>
                    <div class="d-flex align-items-center">
                        <label for="UpdateModelActive" class="mb-0 mr-3">Ativo</label>
                        <div class="checkbox-apple">
                            <input class="yep" type="checkbox" name="active" id="UpdateModelActive" value="1">
                            <label for="UpdateModelActive"></label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa-solid fa-rotate mr-1"></i>Atualizar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- ===================== MODAL: CRIAR TEXTO ============================ -->
<div class="modal fade" id="createTextItemModal" tabindex="-1" role="dialog" aria-labelledby="createTextItemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <form id="createTextItemForm" autocomplete="off">
            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? '' ?>">
            <input type="hidden" name="section_model_id" id="CreateTextItemSectionModelId">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createTextItemModalLabel"><i class="fa-solid fa-plus mr-2"></i>Adicionar texto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="CreateTextItemTitle">Título</label>
                            <input type="text" name="title" id="CreateTextItemTitle" class="form-control" maxlength="255" placeholder="Opcional">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="CreateTextItemSubtitle">Subtítulo</label>
                            <input type="text" name="subtitle" id="CreateTextItemSubtitle" class="form-control" maxlength="255" placeholder="Opcional">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="CreateTextItemSortOrder">Ordem</label>
                            <input type="number" min="1" name="sort_order" id="CreateTextItemSortOrder" class="form-control" placeholder="Auto">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="CreateTextItemContent">Conteúdo</label>
                        <textarea name="content" id="CreateTextItemContent" class="form-control js-page-tinymce" rows="12" placeholder="Digite o conteúdo"></textarea>
                    </div>
                    <div class="d-flex align-items-center">
                        <label for="CreateTextItemActive" class="mb-0 mr-3">Ativo</label>
                        <div class="checkbox-apple">
                            <input class="yep" type="checkbox" name="active" id="CreateTextItemActive" value="1" checked>
                            <label for="CreateTextItemActive"></label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa-solid fa-floppy-disk mr-1"></i>Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- ===================== MODAL: EDITAR TEXTO =========================== -->
<div class="modal fade" id="updateTextItemModal" tabindex="-1" role="dialog" aria-labelledby="updateTextItemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <form id="updateTextItemForm" autocomplete="off">
            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? '' ?>">
            <input type="hidden" name="id" id="UpdateTextItemId">
            <input type="hidden" id="UpdateTextItemModelId">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateTextItemModalLabel"><i class="fa-solid fa-pen-to-square mr-2"></i>Editar texto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="UpdateTextItemTitle">Título</label>
                            <input type="text" name="title" id="UpdateTextItemTitle" class="form-control" maxlength="255">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="UpdateTextItemSubtitle">Subtítulo</label>
                            <input type="text" name="subtitle" id="UpdateTextItemSubtitle" class="form-control" maxlength="255">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="UpdateTextItemSortOrder">Ordem</label>
                            <input type="number" min="1" name="sort_order" id="UpdateTextItemSortOrder" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="UpdateTextItemContent">Conteúdo</label>
                        <textarea name="content" id="UpdateTextItemContent" class="form-control js-page-tinymce" rows="12"></textarea>
                    </div>
                    <div class="d-flex align-items-center">
                        <label for="UpdateTextItemActive" class="mb-0 mr-3">Ativo</label>
                        <div class="checkbox-apple">
                            <input class="yep" type="checkbox" name="active" id="UpdateTextItemActive" value="1">
                            <label for="UpdateTextItemActive"></label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa-solid fa-rotate mr-1"></i>Atualizar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- ===================== MODAL: CRIAR PASTA ============================ -->
<div class="modal fade" id="createFolderModal" tabindex="-1" role="dialog" aria-labelledby="createFolderModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form id="createFolderForm" autocomplete="off">
            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? '' ?>">
            <input type="hidden" name="section_model_id" id="CreateFolderSectionModelId">
            <input type="hidden" name="parent_id" id="CreateFolderParentId">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createFolderModalLabel"><i class="fa-solid fa-folder-plus mr-2"></i><span id="CreateFolderModalTitle">Adicionar pasta</span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="CreateFolderTitle">Título <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="CreateFolderTitle" class="form-control" maxlength="255" required placeholder="Nome da pasta">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="CreateFolderSubtitle">Subtítulo</label>
                            <input type="text" name="subtitle" id="CreateFolderSubtitle" class="form-control" maxlength="255" placeholder="Opcional">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="CreateFolderSortOrder">Ordem</label>
                            <input type="number" min="1" name="sort_order" id="CreateFolderSortOrder" class="form-control" placeholder="Auto">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="CreateFolderDescription">Descrição</label>
                        <textarea name="description" id="CreateFolderDescription" class="form-control" rows="2" placeholder="Opcional"></textarea>
                    </div>
                    <div class="d-flex align-items-center">
                        <label for="CreateFolderActive" class="mb-0 mr-3">Ativa</label>
                        <div class="checkbox-apple">
                            <input class="yep" type="checkbox" name="active" id="CreateFolderActive" value="1" checked>
                            <label for="CreateFolderActive"></label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa-solid fa-floppy-disk mr-1"></i>Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- ===================== MODAL: EDITAR PASTA =========================== -->
<div class="modal fade" id="updateFolderModal" tabindex="-1" role="dialog" aria-labelledby="updateFolderModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form id="updateFolderForm" autocomplete="off">
            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? '' ?>">
            <input type="hidden" name="id" id="UpdateFolderId">
            <input type="hidden" name="parent_id" id="UpdateFolderParentId">
            <input type="hidden" id="UpdateFolderModelId">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateFolderModalLabel"><i class="fa-solid fa-pen-to-square mr-2"></i>Editar pasta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="UpdateFolderTitle">Título <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="UpdateFolderTitle" class="form-control" maxlength="255" required>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="UpdateFolderSubtitle">Subtítulo</label>
                            <input type="text" name="subtitle" id="UpdateFolderSubtitle" class="form-control" maxlength="255">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="UpdateFolderSortOrder">Ordem</label>
                            <input type="number" min="1" name="sort_order" id="UpdateFolderSortOrder" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="UpdateFolderDescription">Descrição</label>
                        <textarea name="description" id="UpdateFolderDescription" class="form-control" rows="2"></textarea>
                    </div>
                    <div class="d-flex align-items-center">
                        <label for="UpdateFolderActive" class="mb-0 mr-3">Ativa</label>
                        <div class="checkbox-apple">
                            <input class="yep" type="checkbox" name="active" id="UpdateFolderActive" value="1">
                            <label for="UpdateFolderActive"></label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa-solid fa-rotate mr-1"></i>Atualizar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- ===================== MODAL: CRIAR ARQUIVO ========================== -->
<div class="modal fade" id="createFileModal" tabindex="-1" role="dialog" aria-labelledby="createFileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <form id="createFileForm" autocomplete="off" enctype="multipart/form-data">
            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? '' ?>">
            <input type="hidden" name="section_model_id" id="CreateFileSectionModelId">
            <input type="hidden" name="folder_id" id="CreateFileFolderId">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createFileModalLabel"><i class="fa-solid fa-file-circle-plus mr-2"></i>Adicionar arquivo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-light border small" id="CreateFileContextInfo"></div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="CreateFileTitle">Título <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="CreateFileTitle" class="form-control" maxlength="255" required placeholder="Título do arquivo">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="CreateFileSubtitle">Subtítulo</label>
                            <input type="text" name="subtitle" id="CreateFileSubtitle" class="form-control" maxlength="255" placeholder="Opcional">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="CreateFileSortOrder">Ordem</label>
                            <input type="number" min="1" name="sort_order" id="CreateFileSortOrder" class="form-control" placeholder="Auto">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="CreateFileDescription">Descrição</label>
                        <textarea name="description" id="CreateFileDescription" class="form-control" rows="2" placeholder="Opcional"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="CreateFileUpload">Arquivo <span class="text-danger">*</span></label>
                        <input type="file" name="file" id="CreateFileUpload" class="form-control" required
                            accept=".pdf,.doc,.docx,.odt,.xls,.xlsx,.ods,.ppt,.pptx,.odp,.csv,.rtf,.txt,.jpg,.jpeg,.png,.webp">
                    </div>
                    <div class="form-row align-items-end">
                        <div class="form-group col-md-4">
                            <label for="CreateFilePublishedAt">Data de publicação</label>
                            <input type="datetime-local" name="published_at" id="CreateFilePublishedAt" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <div class="d-flex align-items-center">
                                <label for="CreateFileShowPublishDate" class="mb-0 mr-3">Exibir data</label>
                                <div class="checkbox-apple">
                                    <input class="yep" type="checkbox" name="show_publish_date" id="CreateFileShowPublishDate" value="1">
                                    <label for="CreateFileShowPublishDate"></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="d-flex align-items-center">
                                <label for="CreateFileActive" class="mb-0 mr-3">Ativo</label>
                                <div class="checkbox-apple">
                                    <input class="yep" type="checkbox" name="active" id="CreateFileActive" value="1" checked>
                                    <label for="CreateFileActive"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="pc-divider">
                    <div class="d-flex justify-content-between align-items-center mb-3" style="gap:.75rem">
                        <div>
                            <h6 class="mb-0"><i class="fa-solid fa-link mr-1"></i>Botões auxiliares</h6>
                            <small class="text-muted">Adicione botões de link ao arquivo.</small>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-primary" id="btnCreateFileAddButtonRow">
                            <i class="fa-solid fa-plus mr-1"></i>Botão
                        </button>
                    </div>
                    <div id="CreateFileButtonsEmpty" class="pc-empty small">Nenhum botão adicionado.</div>
                    <div id="CreateFileButtonsRows"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa-solid fa-floppy-disk mr-1"></i>Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- ===================== MODAL: EDITAR ARQUIVO ========================= -->
<div class="modal fade" id="updateFileModal" tabindex="-1" role="dialog" aria-labelledby="updateFileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <form id="updateFileForm" autocomplete="off" enctype="multipart/form-data">
            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? '' ?>">
            <input type="hidden" name="id" id="UpdateFileId">
            <input type="hidden" name="folder_id" id="UpdateFileFolderId">
            <input type="hidden" id="UpdateFileModelId">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateFileModalLabel"><i class="fa-solid fa-pen-to-square mr-2"></i>Editar arquivo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-light border small" id="UpdateFileContextInfo"></div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="UpdateFileTitle">Título <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="UpdateFileTitle" class="form-control" maxlength="255" required>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="UpdateFileSubtitle">Subtítulo</label>
                            <input type="text" name="subtitle" id="UpdateFileSubtitle" class="form-control" maxlength="255">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="UpdateFileSortOrder">Ordem</label>
                            <input type="number" min="1" name="sort_order" id="UpdateFileSortOrder" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="UpdateFileDescription">Descrição</label>
                        <textarea name="description" id="UpdateFileDescription" class="form-control" rows="2"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="UpdateFileUpload">Substituir arquivo <small class="text-muted">(opcional)</small></label>
                        <input type="file" name="file" id="UpdateFileUpload" class="form-control"
                            accept=".pdf,.doc,.docx,.odt,.xls,.xlsx,.ods,.ppt,.pptx,.odp,.csv,.rtf,.txt,.jpg,.jpeg,.png,.webp">
                        <small class="text-muted" id="UpdateFileCurrentName"></small>
                    </div>
                    <div class="form-row align-items-end">
                        <div class="form-group col-md-4">
                            <label for="UpdateFilePublishedAt">Data de publicação</label>
                            <input type="datetime-local" name="published_at" id="UpdateFilePublishedAt" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <div class="d-flex align-items-center">
                                <label for="UpdateFileShowPublishDate" class="mb-0 mr-3">Exibir data</label>
                                <div class="checkbox-apple">
                                    <input class="yep" type="checkbox" name="show_publish_date" id="UpdateFileShowPublishDate" value="1">
                                    <label for="UpdateFileShowPublishDate"></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="d-flex align-items-center">
                                <label for="UpdateFileActive" class="mb-0 mr-3">Ativo</label>
                                <div class="checkbox-apple">
                                    <input class="yep" type="checkbox" name="active" id="UpdateFileActive" value="1">
                                    <label for="UpdateFileActive"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="pc-divider">
                    <div class="d-flex justify-content-between align-items-center mb-3" style="gap:.75rem">
                        <div>
                            <h6 class="mb-0"><i class="fa-solid fa-link mr-1"></i>Botões auxiliares</h6>
                            <small class="text-muted">Gerencie os botões de link do arquivo.</small>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-primary" id="btnUpdateFileAddButtonRow">
                            <i class="fa-solid fa-plus mr-1"></i>Botão
                        </button>
                    </div>
                    <div id="UpdateFileButtonsEmpty" class="pc-empty small">Nenhum botão cadastrado.</div>
                    <div id="UpdateFileButtonsRows"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa-solid fa-rotate mr-1"></i>Atualizar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- ===================== SCRIPTS ======================================= -->
<script src="<?= BASE_URL ?>public/admin/assets/js/admin-core.js"></script>
<script nonce="<?= $cspNonce ?>">
    document.addEventListener('DOMContentLoaded', function() {
        'use strict';
        AdminCore.init();
        const CSRF = AdminCore.CSRF;
        const toast = (t, m) => AdminCore.toast(t, m);
        const ajax = (opts, loading) => AdminCore.ajax(opts, loading);
        const PAGE = {
            id: <?= $pageId ?>,
            title: <?= json_encode($pageTitle, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>,
            subtitle: <?= json_encode($pageSubtitle, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>,
            slug: <?= json_encode($pageSlug, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>,
            publicUrl: <?= json_encode($pagePublicUrl, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>
        };
        const state = {
            sections: [],
            sectionMap: {},
            modelMap: {},
            selectedSectionId: null,
            expandedFolders: {},
            expandedModels: {},
            updateFileRemovedButtonIds: [],
            previewObjectUrls: {
                create: null,
                update: null
            }
        };
        const tinyConfigs = {
            CreateModelDescription: {
                height: 220
            },
            UpdateModelDescription: {
                height: 220
            },
            CreateTextItemContent: {
                height: 360
            },
            UpdateTextItemContent: {
                height: 360
            },
            CreateFolderDescription: {
                height: 220
            },
            UpdateFolderDescription: {
                height: 220
            },
            CreateFileDescription: {
                height: 220
            },
            UpdateFileDescription: {
                height: 220
            }
        };
        /* ==================================================================== */
        /* HELPERS                                                              */
        /* ==================================================================== */
        function esc(v) {
            return $('<div>').text(v == null ? '' : String(v)).html();
        }

        function statusBadge(active, labels) {
            const l = labels || ['Ativo', 'Inativo'];
            return Number(active) === 1 ?
                '<span class="badge badge-pill badge-status-on">' + l[0] + '</span>' :
                '<span class="badge badge-pill badge-status-off">' + l[1] + '</span>';
        }

        function toggleBtnClass(active) {
            return Number(active) === 1 ? 'btn-outline-secondary' : 'btn-outline-success';
        }

        function toggleBtnLabel(active) {
            return Number(active) === 1 ? 'Desativar' : 'Ativar';
        }

        function toggleBtnIcon(active) {
            return Number(active) === 1 ? 'fa-toggle-off' : 'fa-toggle-on';
        }

        function toggleNextVal(active) {
            return Number(active) === 1 ? 0 : 1;
        }

        function modelTypeLabel(t) {
            const map = {
                text: 'Texto',
                file_list: 'Lista de arquivos',
                folder_files: 'Pastas e arquivos',
                folder_tree: 'Pastas, subpastas e arquivos'
            };
            return map[t] || 'Modelo';
        }

        function modelTypeIcon(t) {
            const map = {
                text: 'fa-align-left',
                file_list: 'fa-file-lines',
                folder_files: 'fa-folder-open',
                folder_tree: 'fa-folder-tree'
            };
            return map[t] || 'fa-cube';
        }

        function modelAddLabel(t) {
            const map = {
                text: 'Texto',
                file_list: 'Arquivo',
                folder_files: 'Pasta',
                folder_tree: 'Pasta'
            };
            return 'Adicionar ' + (map[t] || 'item');
        }

        function getSectionById(id) {
            return state.sectionMap[String(id)] || null;
        }

        function getModelById(id) {
            return state.modelMap[String(id)] || null;
        }

        function sqlToInputDateTime(v) {
            return v ? String(v).replace(' ', 'T').slice(0, 16) : '';
        }

        function formatBytes(b) {
            const n = Number(b || 0);
            if (!n) return '—';
            const u = ['B', 'KB', 'MB', 'GB'];
            let i = 0;
            let x = n;
            while (x >= 1024 && i < u.length - 1) {
                x /= 1024;
                i++;
            }
            return x.toFixed(i ? 1 : 0) + ' ' + u[i];
        }

        function extractResponseId(r) {
            if (!r) return 0;
            return Number(r.id || r.file_id || (r.data && r.data.id) || 0);
        }

        function requestPromise(jqxhr) {
            return new Promise((res, rej) => jqxhr.done(res).fail(rej));
        }

        function spinnerHtml(t) {
            return '<div class="pc-spinner"><i class="fa-solid fa-spinner fa-spin mr-2" aria-hidden="true"></i>' + esc(t || 'Carregando...') + '</div>';
        }

        function emptyHtml(t) {
            return '<div class="pc-empty"><i class="fa-solid fa-circle-info mr-1"></i>' + esc(t || 'Nenhum registro encontrado.') + '</div>';
        }

        function getFolderMap(mId) {
            if (!state.expandedFolders[mId]) state.expandedFolders[mId] = {};
            return state.expandedFolders[mId];
        }

        function isFolderExpanded(m, f) {
            return !!getFolderMap(m)[f];
        }

        function setFolderExpanded(m, f, v) {
            getFolderMap(m)[f] = !!v;
        }

        function isModelExpanded(mId, index) {
            const key = String(mId);
            if (Object.prototype.hasOwnProperty.call(state.expandedModels, key)) {
                return !!state.expandedModels[key];
            }
            return index === 0;
        }

        function setModelExpanded(mId, v) {
            state.expandedModels[String(mId)] = !!v;
        }

        function assetUrl(path) {
            if (!path) return '';
            const p = String(path).trim();
            if (!p) return '';
            if (/^(https?:)?\/\//i.test(p) || p.startsWith('blob:') || p.startsWith('data:')) return p;

            const normalized = p.replace(/^\/+/, '');
            if (typeof AdminCore.sanitizeRelativeAssetPath === 'function') {
                try {
                    return AdminCore.sanitizeRelativeAssetPath(BASE_URL, normalized);
                } catch (e) {}
            }
            return BASE_URL + normalized;
        }

        function lowerExt(name) {
            const n = String(name || '').trim().toLowerCase();
            const parts = n.split('.');
            return parts.length > 1 ? parts.pop() : '';
        }

        function iconForExt(ext) {
            const map = {
                pdf: 'fa-file-pdf',
                doc: 'fa-file-word',
                docx: 'fa-file-word',
                odt: 'fa-file-word',
                xls: 'fa-file-excel',
                xlsx: 'fa-file-excel',
                ods: 'fa-file-excel',
                csv: 'fa-file-csv',
                ppt: 'fa-file-powerpoint',
                pptx: 'fa-file-powerpoint',
                odp: 'fa-file-powerpoint',
                jpg: 'fa-file-image',
                jpeg: 'fa-file-image',
                png: 'fa-file-image',
                webp: 'fa-file-image',
                txt: 'fa-file-lines',
                rtf: 'fa-file-lines'
            };
            return map[ext] || 'fa-file';
        }

        function isPreviewImage(ext) {
            return ['jpg', 'jpeg', 'png', 'webp', 'gif'].includes(ext);
        }

        function isPreviewPdf(ext) {
            return ext === 'pdf';
        }

        function isPreviewText(ext) {
            return ['txt', 'csv', 'rtf'].includes(ext);
        }

        function revokePreviewUrl(type) {
            if (state.previewObjectUrls[type]) {
                try {
                    URL.revokeObjectURL(state.previewObjectUrls[type]);
                } catch (e) {}
                state.previewObjectUrls[type] = null;
            }
        }
        /* ==================================================================== */
        /* TINYMCE                                                              */
        /* ==================================================================== */
        function ensureTiny(id, extra) {
            if (!window.tinymce || !document.getElementById(id) || tinymce.get(id)) return;

            const cfg = tinyConfigs[id] || {};
            tinymce.init({
                selector: '#' + id,
                height: cfg.height || 220,
                menubar: false,
                branding: false,
                convert_urls: false,
                plugins: 'lists link table code fullscreen autoresize',
                toolbar: 'undo redo | blocks | bold italic underline | bullist numlist | link table | code fullscreen',
                autoresize_bottom_margin: 16,
                setup: function(editor) {
                    editor.on('init', function() {
                        const currentValue = $('#' + id).val() || '';
                        editor.setContent(currentValue);
                    });
                },
                ...(extra || {})
            });
        }

        function ensureTinyMany(ids) {
            ids.forEach(id => ensureTiny(id));
        }

        function syncTiny(id) {
            if (window.tinymce && tinymce.get(id)) {
                tinymce.get(id).save();
            }
        }

        function syncTinyMany(ids) {
            ids.forEach(id => syncTiny(id));
        }

        function setTinyValue(id, html, tries) {
            const value = html || '';
            const $field = $('#' + id);
            if ($field.length) $field.val(value);

            if (!window.tinymce) return;

            const editor = tinymce.get(id);
            if (editor) {
                if (editor.initialized) {
                    editor.setContent(value);
                } else {
                    editor.once('init', function() {
                        editor.setContent(value);
                    });
                }
                return;
            }

            const attempt = Number(tries || 0);
            if (attempt < 15) {
                setTimeout(function() {
                    setTinyValue(id, value, attempt + 1);
                }, 120);
            }
        }
        /* ==================================================================== */
        /* FILE PREVIEW                                                         */
        /* ==================================================================== */
        function ensureFilePreviewMarkup() {
            if (!$('#CreateFilePreviewGroup').length) {
                $('#CreateFileUpload').closest('.form-group').after(`
                <div class="form-group" id="CreateFilePreviewGroup">
                    <label>Pré-visualização do arquivo</label>
                    <div id="CreateFilePreviewArea" class="border rounded bg-light p-3">
                        <div id="CreateFilePreviewInner" class="text-muted small">Nenhum arquivo selecionado.</div>
                    </div>
                </div>
            `);
            }

            if (!$('#UpdateFilePreviewGroup').length) {
                $('#UpdateFileUpload').closest('.form-group').after(`
                <div class="form-group" id="UpdateFilePreviewGroup">
                    <label>Pré-visualização do arquivo</label>
                    <div id="UpdateFilePreviewArea" class="border rounded bg-light p-3">
                        <div id="UpdateFilePreviewInner" class="text-muted small">Nenhum arquivo carregado.</div>
                    </div>
                </div>
            `);
            }
        }

        function setFilePreviewHtml(type, html) {
            const target = type === 'create' ? '#CreateFilePreviewInner' : '#UpdateFilePreviewInner';
            $(target).html(html);
        }

        function clearFilePreview(type, message) {
            revokePreviewUrl(type);
            setFilePreviewHtml(type, '<div class="text-muted small">' + esc(message || 'Nenhum arquivo selecionado.') + '</div>');
        }

        function renderGenericFilePreview(type, fileName, ext, url, sizeText) {
            const icon = iconForExt(ext);
            const openBtn = url ?
                `<a href="${esc(url)}" target="_blank" rel="noopener" class="btn btn-sm btn-outline-primary mt-2"><i class="fa-solid fa-up-right-from-square mr-1"></i>Abrir arquivo</a>` :
                '';

            setFilePreviewHtml(type, `
            <div class="d-flex align-items-center" style="gap:.85rem;">
                <div class="d-flex align-items-center justify-content-center border rounded bg-white" style="width:64px;height:64px;">
                    <i class="fa-solid ${icon}" style="font-size:1.45rem;"></i>
                </div>
                <div class="flex-fill">
                    <div class="font-weight-600" style="font-weight:600;">${esc(fileName || 'Arquivo')}</div>
                    <div class="text-muted small">
                        ${ext ? 'Tipo: ' + esc(ext.toUpperCase()) : 'Tipo não identificado'}
                        ${sizeText ? ' &nbsp;•&nbsp; ' + esc(sizeText) : ''}
                    </div>
                    ${openBtn}
                </div>
            </div>
            `);
        }

        function renderImagePreview(type, url, fileName) {
            setFilePreviewHtml(type, `
            <div class="text-center">
                <img src="${esc(url)}" alt="${esc(fileName || 'Pré-visualização')}" style="max-width:100%;max-height:280px;object-fit:contain;border-radius:.35rem;">
            </div>
            `);
        }

        function renderPdfPreview(type, url) {
            setFilePreviewHtml(type, `
            <div>
                <iframe src="${esc(url)}" style="width:100%;height:360px;border:0;border-radius:.35rem;background:#fff;"></iframe>
            </div>
            `);
        }

        function renderTextPreview(type, text, fileName, ext) {
            setFilePreviewHtml(type, `
            <div class="mb-2">
                <strong>${esc(fileName || 'Arquivo')}</strong>
                ${ext ? '<span class="text-muted small ml-2">(' + esc(ext.toUpperCase()) + ')</span>' : ''}
            </div>
            <pre class="mb-0" style="max-height:280px;overflow:auto;white-space:pre-wrap;background:#fff;border:1px solid #dee2e6;border-radius:.35rem;padding:.75rem;">${esc(text || '')}</pre>
            `);
        }

        function resolveExistingFileUrl(data) {
            if (!data) return '';
            const candidates = [
                data.file_url,
                data.url,
                data.public_url,
                data.download_url,
                data.file_path,
                data.path,
                data.relative_path,
                data.stored_path,
                data.file,
                data.file_name,
                data.filename
            ].filter(Boolean);

            if (!candidates.length) return '';
            return assetUrl(candidates[0]);
        }

        function renderExistingFilePreview(type, data) {
            const url = resolveExistingFileUrl(data);
            const fileName = data.original_name || data.file_name || data.filename || data.title || 'Arquivo';
            const ext = lowerExt(data.original_name || data.file_name || data.filename || data.file_path || data.path || data.file_ext || '');
            const sizeText = formatBytes(data.file_size);

            if (!url) {
                renderGenericFilePreview(type, fileName, ext, '', sizeText);
                return;
            }

            if (isPreviewImage(ext)) {
                renderImagePreview(type, url, fileName);
                return;
            }

            if (isPreviewPdf(ext)) {
                renderPdfPreview(type, url);
                return;
            }

            renderGenericFilePreview(type, fileName, ext, url, sizeText);
        }

        function previewSelectedLocalFile(input, type) {
            const file = input && input.files && input.files[0] ? input.files[0] : null;
            if (!file) {
                clearFilePreview(type, type === 'create' ? 'Nenhum arquivo selecionado.' : 'Nenhum arquivo carregado.');
                return;
            }

            revokePreviewUrl(type);

            const ext = lowerExt(file.name);
            const objectUrl = URL.createObjectURL(file);
            state.previewObjectUrls[type] = objectUrl;

            if (isPreviewImage(ext)) {
                renderImagePreview(type, objectUrl, file.name);
                return;
            }

            if (isPreviewPdf(ext)) {
                renderPdfPreview(type, objectUrl);
                return;
            }

            if (isPreviewText(ext)) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    renderTextPreview(type, String(e.target.result || '').slice(0, 6000), file.name, ext);
                };
                reader.onerror = function() {
                    renderGenericFilePreview(type, file.name, ext, objectUrl, formatBytes(file.size));
                };
                reader.readAsText(file);
                return;
            }

            renderGenericFilePreview(type, file.name, ext, objectUrl, formatBytes(file.size));
        }
        /* ==================================================================== */
        /* FILE BUTTON REPEATER                                                 */
        /* ==================================================================== */
        function buildBtnRow(d) {
            d = d || {};
            return `
            <div class="pc-btn-repeater-row">
                <input type="hidden" class="js-file-btn-id" value="${esc(d.id || '')}">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <strong class="small"><i class="fa-solid fa-link mr-1"></i>Botão</strong>
                    <button type="button" class="btn btn-sm btn-outline-danger js-remove-file-button-row">
                        <i class="fa-solid fa-trash mr-1"></i>Remover
                    </button>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4 mb-2">
                        <label class="small mb-1">Título</label>
                        <input type="text" class="form-control form-control-sm js-file-btn-title" value="${esc(d.title || '')}" maxlength="255" placeholder="Ex.: Baixar PDF">
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <label class="small mb-1">Ícone FontAwesome</label>
                        <input type="text" class="form-control form-control-sm js-file-btn-icon" value="${esc(d.icon || '')}" maxlength="255" placeholder="fa-solid fa-download">
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <label class="small mb-1">Ordem</label>
                        <input type="number" min="1" class="form-control form-control-sm js-file-btn-sort-order" value="${esc(d.sort_order || '')}" placeholder="Auto">
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label class="small mb-1">URL</label>
                    <input type="text" class="form-control form-control-sm js-file-btn-url" value="${esc(d.url || '')}" maxlength="512" placeholder="https://...">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4 mb-2">
                        <label class="small mb-1">Início</label>
                        <input type="datetime-local" class="form-control form-control-sm js-file-btn-starts-at" value="${esc(sqlToInputDateTime(d.starts_at || ''))}">
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <label class="small mb-1">Fim</label>
                        <input type="datetime-local" class="form-control form-control-sm js-file-btn-ends-at" value="${esc(sqlToInputDateTime(d.ends_at || ''))}">
                    </div>
                    <div class="form-group col-md-4 mb-2 d-flex" style="gap:1.25rem;align-items:flex-end">
                        <div class="d-flex align-items-center">
                            <label class="mb-0 mr-2 small">Nova aba</label>
                            <div class="checkbox-apple">
                                <input class="yep js-file-btn-open-new-tab" type="checkbox" value="1" ${Number(d.open_new_tab) === 1 ? 'checked' : ''}>
                                <label></label>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <label class="mb-0 mr-2 small">Ativo</label>
                            <div class="checkbox-apple">
                                <input class="yep js-file-btn-active" type="checkbox" value="1" ${Number(d.active) === 1 || !d.id ? 'checked' : ''}>
                                <label></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>`;
        }

        function toggleBtnRepeaterEmpty($rows, $empty) {
            $empty.toggleClass('d-none', $rows.children('.pc-btn-repeater-row').length > 0);
        }

        function resetBtnRepeater($rows, $empty) {
            $rows.html('');
            $empty.removeClass('d-none');
        }

        function collectBtnRows($rows) {
            const out = [];
            $rows.children('.pc-btn-repeater-row').each(function() {
                const $r = $(this);
                const p = {
                    id: Number($r.find('.js-file-btn-id').val() || 0),
                    title: String($r.find('.js-file-btn-title').val() || '').trim(),
                    icon: String($r.find('.js-file-btn-icon').val() || '').trim(),
                    url: String($r.find('.js-file-btn-url').val() || '').trim(),
                    sort_order: String($r.find('.js-file-btn-sort-order').val() || '').trim(),
                    starts_at: String($r.find('.js-file-btn-starts-at').val() || '').trim(),
                    ends_at: String($r.find('.js-file-btn-ends-at').val() || '').trim(),
                    open_new_tab: $r.find('.js-file-btn-open-new-tab').is(':checked') ? 1 : 0,
                    active: $r.find('.js-file-btn-active').is(':checked') ? 1 : 0
                };
                if (p.title || p.url || p.icon || p.id > 0) out.push(p);
            });
            return out;
        }

        function createBtnReq(fileId, row) {
            return requestPromise(ajax({
                url: BASE_URL + 'painel/createPageFileButton',
                type: 'POST',
                dataType: 'json',
                data: {
                    csrf_token: CSRF,
                    file_id: fileId,
                    title: row.title,
                    icon: row.icon,
                    url: row.url,
                    sort_order: row.sort_order,
                    starts_at: row.starts_at,
                    ends_at: row.ends_at,
                    open_new_tab: row.open_new_tab,
                    active: row.active
                }
            }, false));
        }

        function updateBtnReq(row) {
            return requestPromise(ajax({
                url: BASE_URL + 'painel/updatePageFileButton',
                type: 'POST',
                dataType: 'json',
                data: {
                    csrf_token: CSRF,
                    id: row.id,
                    title: row.title,
                    icon: row.icon,
                    url: row.url,
                    sort_order: row.sort_order,
                    starts_at: row.starts_at,
                    ends_at: row.ends_at,
                    open_new_tab: row.open_new_tab,
                    active: row.active
                }
            }, false));
        }

        function deleteBtnReq(id) {
            return requestPromise(ajax({
                url: BASE_URL + 'painel/deletePageFileButton/' + id,
                type: 'POST',
                dataType: 'json',
                data: {
                    csrf_token: CSRF
                }
            }, false));
        }

        function syncCreatedFileBtns(fileId) {
            const rows = collectBtnRows($('#CreateFileButtonsRows'));
            if (!rows.length) return Promise.resolve();
            return Promise.all(rows.map(r => createBtnReq(fileId, r)));
        }

        function syncUpdatedFileBtns(fileId) {
            const rows = collectBtnRows($('#UpdateFileButtonsRows'));
            const removed = state.updateFileRemovedButtonIds.slice();
            const tasks = [];

            removed.forEach(id => {
                if (Number(id) > 0) tasks.push(deleteBtnReq(id));
            });

            rows.forEach(r => {
                tasks.push(Number(r.id) > 0 ? updateBtnReq(r) : createBtnReq(fileId, r));
            });

            state.updateFileRemovedButtonIds = [];
            if (!tasks.length) return Promise.resolve();
            return Promise.all(tasks);
        }
        /* ==================================================================== */
        /* LOADERS                                                              */
        /* ==================================================================== */
        function loadSections(preferredId) {
            ajax({
                    url: BASE_URL + 'painel/getPageSectionsAjax/' + PAGE.id,
                    type: 'GET',
                    dataType: 'json'
                }, {
                    title: 'Carregando seções...',
                    text: 'Aguarde...',
                    minTimeMs: 400,
                    autoClose: true
                })
                .done(function(resp) {
                    const rows = Array.isArray(resp && resp.data) ? resp.data : [];
                    state.sections = rows;
                    state.sectionMap = {};
                    rows.forEach(r => state.sectionMap[String(r.id)] = r);

                    const wantedId = Number(preferredId || state.selectedSectionId || 0);
                    const exists = rows.some(r => Number(r.id) === wantedId);
                    state.selectedSectionId = exists ? wantedId : (rows.length ? Number(rows[0].id) : null);

                    renderSectionsList();
                })
                .fail(function() {
                    state.sections = [];
                    state.sectionMap = {};
                    state.selectedSectionId = null;
                    renderSectionsList();
                    toast('error', 'Não foi possível carregar as seções.');
                });
        }

        function loadModels(sectionId, done) {
            state.modelMap = {};
            ajax({
                    url: BASE_URL + 'painel/getPageSectionModelsAjax/' + sectionId,
                    type: 'GET',
                    dataType: 'json'
                }, false)
                .done(function(resp) {
                    const rows = Array.isArray(resp && resp.data) ? resp.data : [];
                    rows.forEach(r => state.modelMap[String(r.id)] = r);
                    if (done) done(rows);
                })
                .fail(function() {
                    if (done) done([]);
                    toast('error', 'Erro ao carregar os modelos.');
                });
        }

        function loadTextItems(modelId, done) {
            ajax({
                    url: BASE_URL + 'painel/getPageTextItemsAjax/' + modelId,
                    type: 'GET',
                    dataType: 'json'
                }, false)
                .done(r => done(Array.isArray(r && r.data) ? r.data : []))
                .fail(() => {
                    done([]);
                    toast('error', 'Erro ao carregar textos.');
                });
        }

        function loadFolders(modelId, parentId, done) {
            ajax({
                    url: BASE_URL + 'painel/getPageFoldersAjax/' + modelId,
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        parent_id: parentId == null ? '' : parentId
                    }
                }, false)
                .done(r => done(Array.isArray(r && r.data) ? r.data : []))
                .fail(() => {
                    done([]);
                    toast('error', 'Erro ao carregar pastas.');
                });
        }

        function loadFiles(modelId, folderId, done) {
            ajax({
                    url: BASE_URL + 'painel/getPageFilesAjax/' + modelId,
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        folder_id: folderId == null ? '' : folderId
                    }
                }, false)
                .done(r => done(Array.isArray(r && r.data) ? r.data : []))
                .fail(() => {
                    done([]);
                    toast('error', 'Erro ao carregar arquivos.');
                });
        }

        function loadFileButtons(fileId, done) {
            ajax({
                    url: BASE_URL + 'painel/getPageFileButtonsAjax/' + fileId,
                    type: 'GET',
                    dataType: 'json'
                }, false)
                .done(r => done(Array.isArray(r && r.data) ? r.data : []))
                .fail(() => {
                    done([]);
                    toast('error', 'Erro ao carregar botões.');
                });
        }
        /* ==================================================================== */
        /* DATATABLES: FILES                                                    */
        /* ==================================================================== */
        function destroyFileDt(tableId) {
            if ($.fn.DataTable && $.fn.DataTable.isDataTable('#' + tableId)) {
                $('#' + tableId).DataTable().clear().destroy();
            }
        }

        function renderFilesDataTable(containerId, files, modelId, folderId) {
            const $wrap = $('#' + containerId);
            if (!$wrap.length) return;

            if (!Array.isArray(files) || !files.length) {
                $wrap.html(emptyHtml('Nenhum arquivo cadastrado neste nível.'));
                return;
            }

            const tId = 'dt_files_' + modelId + '_' + (folderId == null ? 'root' : folderId);
            destroyFileDt(tId);

            const tableData = files.map(f => ({
                ...f,
                id: Number(f.id || 0),
                sort_order: Number(f.sort_order || 0),
                active: Number(f.active || 0),
                show_publish_date: Number(f.show_publish_date || 0)
            })).sort((a, b) => Number(a.sort_order || 0) - Number(b.sort_order || 0));

            $wrap.html(`
                    <div class="pc-file-table-wrap">
                        <table id="${tId}" class="table table-bordered table-striped table-sm" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="10%">Arquivo:</th>
                                    <th>Tipo/Tamanho:</th>
                                    <th>Publicação:</th>
                                    <th>Status:</th>
                                    <th>Ordem:</th>
                                    <th>Ações:</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                `);

            const dt = $('#' + tId).DataTable({
                data: tableData,
                rowId: 'id',
                order: [
                    [4, 'asc']
                ],
                rowReorder: {
                    dataSrc: 'sort_order',
                    selector: 'td.pc-reorder-td',
                    update: false
                },
                columns: [{
                        data: 'title',
                        render: function(data, type, row) {
                            const title = esc(data || ('Arquivo #' + row.id));
                            const subtitle = row.subtitle ? '<small class="text-muted d-block">' + esc(row.subtitle) + '</small>' : '';
                            return `<div style="font-weight:600">${title}</div>${subtitle}`;
                        }
                    },
                    {
                        data: null,
                        orderable: false,
                        render: function(data, type, row) {
                            const ext = row.file_ext ? '<span class="badge badge-light border mr-1">' + esc(String(row.file_ext).toUpperCase()) + '</span>' : '';
                            return `
                            <div class="d-flex align-items-center flex-wrap">
                                ${ext}
                                <small class="text-muted">${esc(formatBytes(row.file_size))}</small>
                            </div>
                        `;
                        }
                    },
                    {
                        data: 'published_at',
                        type: 'string',
                        render: function(v, type, row) {
                            const pub = row.show_publish_date === 1 && v ? String(v).slice(0, 10) : '—';
                            return '<span class="text-muted">' + esc(pub) + '</span>';
                        }
                    },
                    {
                        data: 'active',
                        type: 'string',
                        render: function(active) {
                            return Number(active) === 1 ?
                                '<span class="badge badge-success">Ativo</span>' :
                                '<span class="badge badge-secondary">Inativo</span>';
                        }
                    },
                    {
                        data: 'sort_order',
                        type: 'string',
                        className: 'text-left pc-reorder-td',
                        render: function(v, type) {
                            const n = Number(v || 0);
                            if (type === 'sort' || type === 'type') return n;
                            return `
                            <span class="d-inline-flex align-items-center">
                                <i class="fa-solid fa-grip-vertical text-muted mr-2" aria-hidden="true"></i>${n}
                            </span>
                        `;
                        }
                    },
                    {
                        data: null,
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            const isActive = Number(row.active) === 1;
                            const btnLabel = isActive ? 'Desativar' : 'Ativar';
                            const btnIcon = isActive ? 'fa-toggle-off' : 'fa-toggle-on';
                            const btnClass = isActive ? 'btn-outline-secondary' : 'btn-outline-success';
                            const nextVal = isActive ? 0 : 1;

                            return `
                            <div class="d-inline-flex align-items-center flex-wrap" style="gap:.5rem;">
                                <button
                                    type="button"
                                    class="btn btn-sm ${btnClass} m-1 btnToggleFileActive"
                                    data-id="${row.id}"
                                    data-model-id="${modelId}"
                                    data-next="${nextVal}"
                                    title="${btnLabel}"
                                    aria-label="${btnLabel}">
                                    <i class="fa-solid ${btnIcon}" aria-hidden="true"></i> ${btnLabel}
                                </button>
                                <button
                                    type="button"
                                    class="btn btn-sm btn-outline-info m-1 btnEditFile"
                                    data-id="${row.id}"
                                    data-model-id="${modelId}">
                                    <i class="fa fa-edit" aria-hidden="true"></i> Editar
                                </button>
                                <button
                                    type="button"
                                    class="btn btn-sm btn-outline-danger m-1 btnDeleteFile"
                                    data-id="${row.id}"
                                    data-model-id="${modelId}">
                                    <i class="fa-solid fa-trash" aria-hidden="true"></i> Excluir
                                </button>
                            </div>
                        `;
                        }
                    }
                ],
                responsive: true,
                language: {
                    url: BASE_URL + 'public/admin/assets/adminlte/plugins/datatables/js/Portuguese-Brasil.json'
                }
            });

            let savingFileOrder = false;

            dt.on('row-reorder', function(e, diff) {
                if (!diff || !diff.length) return;
                if (savingFileOrder) return;

                const updates = diff.map(function(change) {
                    const rowData = dt.row(change.node).data();
                    return {
                        id: Number(rowData.id),
                        sort_order: Number(change.newData)
                    };
                });

                savingFileOrder = true;

                ajax({
                        url: BASE_URL + 'painel/reorderPageFiles',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            csrf_token: CSRF,
                            items: JSON.stringify(updates)
                        }
                    }, false)
                    .done(function(resp) {
                        renderModelBodyById(modelId);
                        if (resp && resp.success) toast('success', resp.message || 'Ordem atualizada com sucesso!');
                        else toast('error', (resp && resp.message) || 'Falha ao salvar a nova ordem.');
                    })
                    .fail(function() {
                        renderModelBodyById(modelId);
                        toast('error', 'Não foi possível salvar a nova ordem.');
                    })
                    .always(function() {
                        savingFileOrder = false;
                    });
            });
        }
        /* ==================================================================== */
        /* SORTABLES                                                            */
        /* ==================================================================== */
        function makeSortable($container, itemSel, handleSel, buildItems, url, successMsg, errorMsg, onDone) {
            if (!$container.length || typeof $.fn.sortable !== 'function') return;
            if ($container.hasClass('ui-sortable')) $container.sortable('destroy');

            $container.sortable({
                items: itemSel,
                handle: handleSel,
                axis: 'y',
                tolerance: 'pointer',
                placeholder: 'pc-sortable-placeholder',
                helper: function(e, item) {
                    const $h = item.clone(false, false).addClass('shadow');
                    $h.width(item.outerWidth());
                    return $h;
                },
                start: function(e, ui) {
                    ui.placeholder.height(ui.helper.outerHeight());
                },
                update: function() {
                    const items = buildItems();
                    if (!items.length) return;

                    ajax({
                            url,
                            type: 'POST',
                            dataType: 'json',
                            data: {
                                csrf_token: CSRF,
                                items: JSON.stringify(items)
                            }
                        }, false)
                        .done(r => {
                            if (r && r.success && onDone) onDone();
                            toast(r && r.success ? 'success' : 'error', (r && r.message) || (r && r.success ? successMsg : errorMsg));
                        })
                        .fail(() => {
                            toast('error', errorMsg);
                            if (onDone) onDone();
                        });
                }
            }).disableSelection();
        }

        function initSectionsSortable() {
            makeSortable(
                $('#sectionsList'),
                '> .pc-section-item',
                '.pc-section-handle',
                () => {
                    const it = [];
                    $('#sectionsList .pc-section-item').each((i, el) => it.push({
                        id: Number($(el).data('section-id')),
                        sort_order: i + 1
                    }));
                    return it;
                },
                BASE_URL + 'painel/reorderPageSections',
                'Seções reordenadas!',
                'Erro ao reordenar seções.',
                () => loadSections(state.selectedSectionId)
            );
        }

        function initModelsSortable() {
            makeSortable(
                $('#pcModelList'),
                '> .pc-model-card',
                '.pc-model-handle',
                () => {
                    const it = [];
                    $('#pcModelList .pc-model-card').each((i, el) => it.push({
                        id: Number($(el).data('model-id')),
                        sort_order: i + 1
                    }));
                    return it;
                },
                BASE_URL + 'painel/reorderPageSectionModels',
                'Modelos reordenados!',
                'Erro ao reordenar modelos.',
                () => loadSections(state.selectedSectionId)
            );
        }

        function initTextItemsSortable(modelId) {
            makeSortable(
                $('#pcTextList_' + modelId),
                '> .pc-text-card',
                '.pc-text-handle',
                () => {
                    const it = [];
                    $('#pcTextList_' + modelId + ' .pc-text-card').each((i, el) => it.push({
                        id: Number($(el).data('text-id')),
                        sort_order: i + 1
                    }));
                    return it;
                },
                BASE_URL + 'painel/reorderPageTextItems',
                'Textos reordenados!',
                'Erro ao reordenar textos.',
                () => renderModelBodyById(modelId)
            );
        }

        function initFoldersSortable(listId, modelId) {
            const $l = $('#' + listId);
            makeSortable(
                $l,
                '> .pc-folder-node',
                '.pc-folder-handle',
                () => {
                    const it = [];
                    $l.children('.pc-folder-node').each((i, el) => it.push({
                        id: Number($(el).data('folder-id')),
                        sort_order: i + 1
                    }));
                    return it;
                },
                BASE_URL + 'painel/reorderPageFolders',
                'Pastas reordenadas!',
                'Erro ao reordenar pastas.',
                () => renderModelBodyById(modelId)
            );
        }
        /* ==================================================================== */
        /* RENDERS                                                              */
        /* ==================================================================== */
        function renderSectionsList() {
            const $list = $('#sectionsList');
            const $empty = $('#sectionsEmptyState');

            if (!state.sections.length) {
                $list.html('');
                $empty.removeClass('d-none');
                renderDetail();
                return;
            }

            $empty.addClass('d-none');

            $list.html(state.sections.map(s => `
                <article class="pc-section-item ${Number(state.selectedSectionId) === Number(s.id) ? 'is-active' : ''}" data-section-id="${s.id}">
                    <div class="pc-section-handle" title="Arrastar para reordenar">
                        <i class="fa-solid fa-grip-vertical fa-sm" aria-hidden="true"></i>
                    </div>
                    <button type="button" class="pc-section-btn js-select-section" data-id="${s.id}">
                        <div class="pc-section-name">${esc(s.title || ('Seção #' + s.id))}</div>
                        <div class="pc-section-sub">${esc(s.subtitle || '')}</div>
                        <div class="pc-section-meta">
                            ${statusBadge(s.active, ['Ativa', 'Inativa'])}
                            <span class="badge badge-light border">${esc(s.models_count || 0)} modelo(s)</span>
                        </div>
                    </button>
                </article>
            `).join(''));

            initSectionsSortable();
            renderDetail();
        }

        function renderDetail() {
            const section = getSectionById(state.selectedSectionId);
            const $panel = $('#sectionDetailPanel');

            if (!section) {
                $panel.html(`
                <div class="pc-detail-empty">
                    <div class="pc-detail-empty-icon"><i class="fa-solid fa-hand-pointer" aria-hidden="true"></i></div>
                    <div class="pc-detail-empty-title">Selecione uma seção</div>
                    <div class="small">Escolha uma seção na coluna da esquerda para gerenciar seus modelos e conteúdos.</div>
                </div>
            `);
                return;
            }

            $panel.html(`
                <article class="pc-detail-card" data-detail-section-id="${section.id}">
                    <div class="pc-detail-head">
                        <div class="pc-detail-info">
                            <h2 class="pc-detail-title">${esc(section.title || ('Seção #' + section.id))}</h2>
                            <p class="pc-detail-sub">${esc(section.subtitle || 'Sem subtítulo.')}</p>
                            <div class="d-flex flex-wrap gap-1" style="gap:.35rem;">
                                ${statusBadge(section.active, ['Ativa', 'Inativa'])}
                                <span class="badge badge-light border">Ordem: ${esc(section.sort_order || 0)}</span>
                            </div>
                        </div>
                        <div class="pc-detail-actions">
                            <button type="button" class="btn btn-sm ${toggleBtnClass(section.active)} btnDetailToggleSection" data-id="${section.id}" data-next="${toggleNextVal(section.active)}">
                                <i class="fa-solid ${toggleBtnIcon(section.active)} mr-1"></i>${esc(toggleBtnLabel(section.active))}
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-info btnDetailEditSection" data-id="${section.id}">
                                <i class="fa-solid fa-pen-to-square mr-1"></i>Editar
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-danger btnDetailDeleteSection" data-id="${section.id}">
                                <i class="fa-solid fa-trash mr-1"></i>Excluir
                            </button>
                        </div>
                    </div>
                    <div class="pc-detail-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h3 class="h6 mb-0 text-muted"><i class="fa-solid fa-cubes mr-1"></i>Modelos</h3>
                            <button type="button" class="btn btn-sm btn-success btnDetailAddModel" data-section-id="${section.id}">
                                <i class="fa-solid fa-plus mr-1"></i>Adicionar modelo
                            </button>
                        </div>
                        <div id="modelsPanel">${spinnerHtml('Carregando modelos...')}</div>
                    </div>
                </article>
            `);

            loadModels(section.id, function(models) {
                renderModelsPanel(models);
            });
        }

        function renderModelsPanel(models) {
            const $panel = $('#modelsPanel');

            if (!models.length) {
                $panel.html(emptyHtml('Esta seção ainda não possui modelos cadastrados.'));
                return;
            }

            $panel.html(`
                <div class="pc-model-list" id="pcModelList">
                    ${models.map((m, index) => {
                        state.modelMap[String(m.id)] = m;
                        const collapseId = 'modelCollapse_' + m.id;
                        const expanded = isModelExpanded(m.id, index);

                        return `
                            <article class="pc-model-card" data-model-id="${m.id}">
                                <div class="pc-model-head">
                                    <div class="pc-model-handle" title="Arrastar para reordenar">
                                        <i class="fa-solid fa-grip-vertical fa-sm" aria-hidden="true"></i>
                                    </div>

                                    <button type="button"
                                            class="btn btn-sm btn-light border btnToggleModelCollapse"
                                            data-target="#${collapseId}"
                                            data-model-id="${m.id}"
                                            aria-expanded="${expanded ? 'true' : 'false'}"
                                            title="${expanded ? 'Recolher modelo' : 'Expandir modelo'}"
                                            style="min-width:34px;height:40px;display:flex;align-items:center;justify-content:center;">
                                        <i class="fa-solid ${expanded ? 'fa-chevron-down' : 'fa-chevron-right'}" aria-hidden="true"></i>
                                    </button>

                                    <div class="pc-model-icon">
                                        <i class="fa-solid ${modelTypeIcon(m.model_type)}" aria-hidden="true"></i>
                                    </div>

                                    <div class="pc-model-info">
                                        <div class="pc-model-title">${esc(m.title || modelTypeLabel(m.model_type))}</div>
                                        ${m.subtitle ? '<div class="pc-model-sub">' + esc(m.subtitle) + '</div>' : ''}
                                        <div class="pc-model-meta">
                                            ${statusBadge(m.active)}
                                            <span class="badge badge-type">${esc(modelTypeLabel(m.model_type))}</span>
                                        </div>
                                        ${m.description ? '<div class="pc-model-desc">' + esc(m.description) + '</div>' : ''}
                                    </div>

                                    <div class="pc-model-actions">
                                        <button class="btn btn-sm btn-success btnModelAddItem" data-id="${m.id}" data-model-type="${esc(m.model_type)}">
                                            <i class="fa-solid fa-plus mr-1"></i>${esc(modelAddLabel(m.model_type))}
                                        </button>
                                        <button class="btn btn-sm ${toggleBtnClass(m.active)} btnToggleModel" data-id="${m.id}" data-next="${toggleNextVal(m.active)}">
                                            <i class="fa-solid ${toggleBtnIcon(m.active)} mr-1"></i>${esc(toggleBtnLabel(m.active))}
                                        </button>
                                        <button class="btn btn-sm btn-outline-info btnEditModel" data-id="${m.id}">
                                            <i class="fa-solid fa-pen-to-square mr-1"></i>Editar
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger btnDeleteModel" data-id="${m.id}">
                                            <i class="fa-solid fa-trash mr-1"></i>Excluir
                                        </button>
                                    </div>
                                </div>

                                <div id="${collapseId}" class="collapse pc-model-collapse ${expanded ? 'show' : ''}" data-model-id="${m.id}">
                                    <div class="pc-model-body" id="mbody_${m.id}" data-loaded="${expanded ? '0' : '0'}">
                                        ${expanded ? spinnerHtml('Carregando conteúdo...') : ''}
                                    </div>
                                </div>
                            </article>
                        `;
                    }).join('')}
                </div>
            `);

            initModelsSortable();

            models.forEach((m, index) => {
                if (isModelExpanded(m.id, index)) {
                    renderModelBody(m);
                }
            });
        }

        function renderModelBody(model) {
            if (!model) return;

            const $body = $('#mbody_' + model.id);
            if ($body.length) $body.attr('data-loaded', '1');

            const t = String(model.model_type || '');
            if (t === 'text') renderTextModel(model);
            else if (t === 'file_list') renderFileListModel(model);
            else if (t === 'folder_files') renderFolderModel(model, false);
            else if (t === 'folder_tree') renderFolderModel(model, true);
        }

        function renderModelBodyById(modelId) {
            const m = getModelById(modelId);
            if (m) renderModelBody(m);
        }

        function renderTextModel(model) {
            const $body = $('#mbody_' + model.id);
            $body.html(`
            <div class="pc-model-toolbar">
                <div>
                    <div class="pc-model-toolbar-title">Textos cadastrados</div>
                    <div class="pc-model-toolbar-sub">Clique em "Adicionar texto" no cabeçalho do modelo.</div>
                </div>
            </div>
            <div id="textPanel_${model.id}">${spinnerHtml('Carregando textos...')}</div>
            `);

            loadTextItems(model.id, items => {
                $('#textPanel_' + model.id).html(renderTextItems(items, model.id));
                initTextItemsSortable(model.id);
            });
        }

        function renderTextItems(items, modelId) {
            if (!items.length) return emptyHtml('Nenhum texto cadastrado neste modelo.');

            return `
            <div class="pc-text-list" id="pcTextList_${modelId}">
                ${items.map(it => `
                    <article class="pc-text-card" data-text-id="${it.id}">
                        <div class="pc-text-handle" title="Arrastar">
                            <i class="fa-solid fa-grip-vertical fa-sm" aria-hidden="true"></i>
                        </div>
                        <div class="pc-text-body">
                            <div class="pc-text-title">${esc(it.title || 'Texto sem título')}</div>
                            ${it.subtitle ? '<div class="pc-text-sub">' + esc(it.subtitle) + '</div>' : '<div class="pc-text-sub"></div>'}
                            <div class="pc-text-meta">
                                ${statusBadge(it.active)}
                                <span class="badge badge-light border">Ordem: ${esc(it.sort_order || 0)}</span>
                            </div>
                            <div class="pc-text-acts">
                                <button class="btn btn-sm ${toggleBtnClass(it.active)} btnToggleTextItem" data-id="${it.id}" data-model-id="${modelId}" data-next="${toggleNextVal(it.active)}">
                                    <i class="fa-solid ${toggleBtnIcon(it.active)} mr-1"></i>${esc(toggleBtnLabel(it.active))}
                                </button>
                                <button class="btn btn-sm btn-outline-info btnEditTextItem" data-id="${it.id}" data-model-id="${modelId}">
                                    <i class="fa-solid fa-pen-to-square mr-1"></i>Editar
                                </button>
                                <button class="btn btn-sm btn-outline-danger btnDeleteTextItem" data-id="${it.id}" data-model-id="${modelId}">
                                    <i class="fa-solid fa-trash mr-1"></i>Excluir
                                </button>
                            </div>
                        </div>
                    </article>
                `).join('')}
            </div>
            `;
        }

        function renderFileListModel(model) {
            const $body = $('#mbody_' + model.id);
            $body.html(`
            <div class="pc-model-toolbar">
                <div>
                    <div class="pc-model-toolbar-title">Arquivos cadastrados</div>
                    <div class="pc-model-toolbar-sub">Arraste as linhas da tabela para reordenar.</div>
                </div>
            </div>
            <div id="fileListPanel_${model.id}">${spinnerHtml('Carregando arquivos...')}</div>
            `);

            loadFiles(model.id, null, files => {
                renderFilesDataTable('fileListPanel_' + model.id, files, model.id, null);
            });
        }

        function renderFolderModel(model, isTree) {
            const $body = $('#mbody_' + model.id);
            const listId = 'rootFolderList_' + model.id;

            $body.html(`
            <div class="pc-model-toolbar">
                <div>
                    <div class="pc-model-toolbar-title">${isTree ? 'Pastas, subpastas e arquivos' : 'Pastas e arquivos'}</div>
                    <div class="pc-model-toolbar-sub">${isTree ? 'Estrutura: Pasta → Subpasta → Arquivos (3 níveis).' : 'Estrutura: Pasta → Arquivos (2 níveis).'}</div>
                </div>
            </div>
            <div id="rootFoldersPanel_${model.id}">${spinnerHtml('Carregando pastas...')}</div>
            `);

            loadFolders(model.id, null, folders => {
                $('#rootFoldersPanel_' + model.id).html(
                    renderFolderNodes(folders, model.id, isTree, null, 0, listId)
                );
                initFoldersSortable(listId, model.id);
                hydrateOpenFolders($('#rootFoldersPanel_' + model.id));
            });
        }

        function renderFolderNodes(folders, modelId, isTree, parentId, depth, listId) {
            if (!folders.length) {
                const msg = depth === 0 ? 'Nenhuma pasta cadastrada.' : 'Nenhuma subpasta cadastrada.';
                return emptyHtml(msg);
            }

            const id = listId || ('folderList_' + modelId + '_' + (parentId || 'root'));

            return `
            <div class="pc-folder-list" id="${id}">
                ${folders.map(folder => {
                    const colId = 'fc_' + modelId + '_' + folder.id;
                    const expanded = isFolderExpanded(modelId, folder.id);

                    return `
                        <article class="pc-folder-node ${expanded ? 'is-open' : ''}" data-folder-id="${folder.id}">
                            <div class="pc-folder-head js-folder-toggle" data-collapse-target="${colId}" aria-expanded="${expanded ? 'true' : 'false'}">
                                <div class="pc-folder-handle js-no-toggle" title="Arrastar para reordenar">
                                    <i class="fa-solid fa-grip-vertical fa-sm" aria-hidden="true"></i>
                                </div>

                                <i class="fa-solid fa-chevron-right pc-folder-chevron" aria-hidden="true"></i>
                                <i class="fa-solid fa-folder pc-folder-icon" aria-hidden="true"></i>

                                <div class="pc-folder-info">
                                    <div class="pc-folder-title">${esc(folder.title || ('Pasta #' + folder.id))}</div>
                                    ${folder.subtitle ? '<div class="pc-folder-sub">' + esc(folder.subtitle) + '</div>' : ''}
                                    <div class="pc-folder-meta">${statusBadge(folder.active, ['Ativa', 'Inativa'])}</div>
                                </div>

                                <div class="pc-folder-acts js-no-toggle">
                                    <button class="btn btn-sm ${toggleBtnClass(folder.active)} btnToggleFolder" data-id="${folder.id}" data-model-id="${modelId}" data-next="${toggleNextVal(folder.active)}" title="${esc(toggleBtnLabel(folder.active))}">
                                        <i class="fa-solid ${toggleBtnIcon(folder.active)}" aria-hidden="true"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-info btnEditFolder" data-id="${folder.id}" data-model-id="${modelId}" title="Editar">
                                        <i class="fa-solid fa-pen-to-square" aria-hidden="true"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger btnDeleteFolder" data-id="${folder.id}" data-model-id="${modelId}" title="Excluir">
                                        <i class="fa-solid fa-trash" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>

                            <div id="${colId}" class="collapse folder-collapse ${expanded ? 'show' : ''}"
                                 data-model-id="${modelId}"
                                 data-folder-id="${folder.id}"
                                 data-folder-title="${esc(folder.title || ('Pasta #' + folder.id))}"
                                 data-is-tree="${isTree ? '1' : '0'}"
                                 data-depth="${depth}">
                                <div class="pc-folder-body" id="fbody_${modelId}_${folder.id}">
                                    ${expanded ? spinnerHtml('Carregando...') : ''}
                                </div>
                            </div>
                        </article>
                    `;
                }).join('')}
            </div>
            `;
        }

        function loadFolderBody(modelId, folderId, isTree, depth) {
            const $body = $('#fbody_' + modelId + '_' + folderId);
            if (!$body.length) return;

            const folderTitle = $('#fc_' + modelId + '_' + folderId).data('folder-title') || ('Pasta #' + folderId);

            if (isTree && depth === 0) {
                const subListId = 'subList_' + modelId + '_' + folderId;
                $body.html(`
                <div class="pc-folder-toolbar">
                    <button class="btn btn-sm btn-outline-success btnAddFolder"
                            data-model-id="${modelId}"
                            data-parent-id="${folderId}"
                            data-parent-title="${esc(folderTitle)}"
                            data-is-subfolder="1">
                        <i class="fa-solid fa-folder-plus mr-1"></i>Adicionar subpasta
                    </button>
                </div>
                <div class="pc-subfolder-block">
                    <div class="pc-block-label">Subpastas</div>
                    <div id="subPanel_${modelId}_${folderId}">${spinnerHtml('Carregando subpastas...')}</div>
                </div>
            `);

                loadFolders(modelId, folderId, subs => {
                    $('#subPanel_' + modelId + '_' + folderId).html(
                        renderFolderNodes(subs, modelId, isTree, folderId, 1, subListId)
                    );
                    initFoldersSortable(subListId, modelId);
                    hydrateOpenFolders($('#subPanel_' + modelId + '_' + folderId));
                });
                return;
            }

            $body.html(`
            <div class="pc-folder-toolbar">
                <button class="btn btn-sm btn-outline-primary btnAddFile"
                        data-model-id="${modelId}"
                        data-folder-id="${folderId}"
                        data-folder-title="${esc(folderTitle)}">
                    <i class="fa-solid fa-file-circle-plus mr-1"></i>Adicionar arquivo
                </button>
            </div>
            <div class="pc-files-block">
                <div class="pc-block-label">Arquivos</div>
                <div id="filesPanel_${modelId}_${folderId}">${spinnerHtml('Carregando arquivos...')}</div>
            </div>
            `);

            loadFiles(modelId, folderId, files => {
                renderFilesDataTable('filesPanel_' + modelId + '_' + folderId, files, modelId, folderId);
            });
        }

        function hydrateOpenFolders($scope) {
            $scope.find('.folder-collapse.show').each(function() {
                const $c = $(this);
                loadFolderBody(
                    Number($c.data('model-id')),
                    Number($c.data('folder-id')),
                    Number($c.data('is-tree')) === 1,
                    Number($c.data('depth') || 0)
                );
            });
        }
        /* ==================================================================== */
        /* MODAL OPENERS                                                        */
        /* ==================================================================== */
        function openCreateSection() {
            $('#createSectionForm')[0].reset();
            $('#CreateSectionActive').prop('checked', true);
            $('#createSectionModal').modal('show');
        }

        function openEditSection(id) {
            ajax({
                    url: BASE_URL + 'painel/getPageSectionAjaxById/' + id,
                    type: 'GET',
                    dataType: 'json'
                }, {
                    title: 'Carregando...',
                    minTimeMs: 400,
                    autoClose: false
                })
                .done(r => {
                    if (r && r.success && r.data) {
                        const d = r.data;
                        $('#UpdateSectionId').val(d.id);
                        $('#UpdateSectionTitle').val(d.title);
                        $('#UpdateSectionSubtitle').val(d.subtitle || '');
                        $('#UpdateSectionSortOrder').val(d.sort_order || '');
                        $('#UpdateSectionActive').prop('checked', !!+d.active);
                        AdminCore.finishLoading(400, () => $('#updateSectionModal').modal('show'));
                    } else {
                        AdminCore.finishLoading(400, () => Swal.fire('Erro!', r && r.message || 'Erro ao carregar.', 'error'));
                    }
                })
                .fail(() => AdminCore.finishLoading(400, () => Swal.fire('Erro!', 'Erro de comunicação.', 'error')));
        }

        function openCreateModel(sectionId) {
            $('#createModelForm')[0].reset();
            $('#CreateModelSectionId').val(sectionId);
            $('#CreateModelActive').prop('checked', true);
            setTinyValue('CreateModelDescription', '');
            $('#createModelModal').modal('show');
        }

        function openEditModel(id) {
            ajax({
                    url: BASE_URL + 'painel/getPageSectionModelAjaxById/' + id,
                    type: 'GET',
                    dataType: 'json'
                }, {
                    title: 'Carregando...',
                    minTimeMs: 400,
                    autoClose: false
                })
                .done(r => {
                    if (r && r.success && r.data) {
                        const d = r.data;
                        $('#UpdateModelId').val(d.id);
                        $('#UpdateModelSectionId').val(d.section_id);
                        $('#UpdateModelType').val(d.model_type);
                        $('#UpdateModelTitle').val(d.title || '');
                        $('#UpdateModelSubtitle').val(d.subtitle || '');
                        $('#UpdateModelSortOrder').val(d.sort_order || '');
                        $('#UpdateModelActive').prop('checked', !!+d.active);
                        setTinyValue('UpdateModelDescription', d.description || '');
                        AdminCore.finishLoading(400, () => $('#updateModelModal').modal('show'));
                    } else {
                        AdminCore.finishLoading(400, () => Swal.fire('Erro!', r && r.message || 'Erro ao carregar.', 'error'));
                    }
                })
                .fail(() => AdminCore.finishLoading(400, () => Swal.fire('Erro!', 'Erro de comunicação.', 'error')));
        }

        function openCreateTextItem(modelId) {
            $('#createTextItemForm')[0].reset();
            $('#CreateTextItemSectionModelId').val(modelId);
            $('#CreateTextItemActive').prop('checked', true);
            setTinyValue('CreateTextItemContent', '');
            $('#createTextItemModal').modal('show');
        }

        function openEditTextItem(id, modelId) {
            ajax({
                    url: BASE_URL + 'painel/getPageTextItemAjaxById/' + id,
                    type: 'GET',
                    dataType: 'json'
                }, {
                    title: 'Carregando...',
                    minTimeMs: 400,
                    autoClose: false
                })
                .done(r => {
                    if (r && r.success && r.data) {
                        const d = r.data;
                        $('#UpdateTextItemId').val(d.id);
                        $('#UpdateTextItemModelId').val(d.section_model_id || modelId);
                        $('#UpdateTextItemTitle').val(d.title || '');
                        $('#UpdateTextItemSubtitle').val(d.subtitle || '');
                        $('#UpdateTextItemSortOrder').val(d.sort_order || '');
                        $('#UpdateTextItemActive').prop('checked', !!+d.active);

                        AdminCore.finishLoading(400, () => {
                            $('#updateTextItemModal').modal('show');
                            setTinyValue('UpdateTextItemContent', d.content || '');
                        });
                    } else {
                        AdminCore.finishLoading(400, () => Swal.fire('Erro!', r && r.message || 'Erro ao carregar.', 'error'));
                    }
                })
                .fail(() => AdminCore.finishLoading(400, () => Swal.fire('Erro!', 'Erro de comunicação.', 'error')));
        }

        function openCreateFolder(modelId, parentId, parentTitle, isSubfolder) {
            const label = isSubfolder ? 'Adicionar subpasta' : 'Adicionar pasta';
            $('#createFolderForm')[0].reset();
            $('#CreateFolderSectionModelId').val(modelId);
            $('#CreateFolderParentId').val(parentId == null ? '' : parentId);
            $('#CreateFolderActive').prop('checked', true);
            $('#CreateFolderModalTitle').text(label);
            setTinyValue('CreateFolderDescription', '');
            $('#createFolderModal').modal('show');
        }

        function openEditFolder(id, modelId) {
            ajax({
                    url: BASE_URL + 'painel/getPageFolderAjaxById/' + id,
                    type: 'GET',
                    dataType: 'json'
                }, {
                    title: 'Carregando...',
                    minTimeMs: 400,
                    autoClose: false
                })
                .done(r => {
                    if (r && r.success && r.data) {
                        const d = r.data;
                        $('#UpdateFolderId').val(d.id);
                        $('#UpdateFolderModelId').val(d.section_model_id || modelId);
                        $('#UpdateFolderParentId').val(d.parent_id == null ? '' : d.parent_id);
                        $('#UpdateFolderTitle').val(d.title || '');
                        $('#UpdateFolderSubtitle').val(d.subtitle || '');
                        $('#UpdateFolderSortOrder').val(d.sort_order || '');
                        $('#UpdateFolderActive').prop('checked', !!+d.active);
                        setTinyValue('UpdateFolderDescription', d.description || '');
                        AdminCore.finishLoading(400, () => $('#updateFolderModal').modal('show'));
                    } else {
                        AdminCore.finishLoading(400, () => Swal.fire('Erro!', r && r.message || 'Erro ao carregar.', 'error'));
                    }
                })
                .fail(() => AdminCore.finishLoading(400, () => Swal.fire('Erro!', 'Erro de comunicação.', 'error')));
        }

        function openCreateFile(modelId, folderId, folderTitle) {
            const m = getModelById(modelId);

            $('#createFileForm')[0].reset();
            $('#CreateFileSectionModelId').val(modelId);
            $('#CreateFileFolderId').val(folderId == null ? '' : folderId);
            $('#CreateFileActive').prop('checked', true);

            setTinyValue('CreateFileDescription', '');
            resetBtnRepeater($('#CreateFileButtonsRows'), $('#CreateFileButtonsEmpty'));
            clearFilePreview('create', 'Nenhum arquivo selecionado.');

            let ctx = '<strong>Modelo:</strong> ' + esc(m ? (m.title || modelTypeLabel(m.model_type)) : ('Modelo #' + modelId));
            if (folderId != null) ctx += ' &nbsp;|&nbsp; <strong>Pasta:</strong> ' + esc(folderTitle || ('Pasta #' + folderId));
            $('#CreateFileContextInfo').html(ctx);

            $('#createFileModal').modal('show');
        }

        function openEditFile(id, modelId) {
            ajax({
                    url: BASE_URL + 'painel/getPageFileAjaxById/' + id,
                    type: 'GET',
                    dataType: 'json'
                }, {
                    title: 'Carregando...',
                    minTimeMs: 400,
                    autoClose: false
                })
                .done(r => {
                    if (r && r.success && r.data) {
                        const d = r.data;

                        $('#UpdateFileId').val(d.id);
                        $('#UpdateFileModelId').val(d.section_model_id || modelId);
                        $('#UpdateFileFolderId').val(d.folder_id == null ? '' : d.folder_id);
                        $('#UpdateFileTitle').val(d.title || '');
                        $('#UpdateFileSubtitle').val(d.subtitle || '');
                        $('#UpdateFileSortOrder').val(d.sort_order || '');
                        $('#UpdateFilePublishedAt').val(sqlToInputDateTime(d.published_at || ''));
                        $('#UpdateFileShowPublishDate').prop('checked', !!+d.show_publish_date);
                        $('#UpdateFileActive').prop('checked', !!+d.active);
                        $('#UpdateFileCurrentName').text(d.original_name ? 'Arquivo atual: ' + d.original_name : '');
                        $('#UpdateFileContextInfo').html('<strong>Editando:</strong> ' + esc(d.title || ('Arquivo #' + d.id)));

                        setTinyValue('UpdateFileDescription', d.description || '');
                        renderExistingFilePreview('update', d);

                        state.updateFileRemovedButtonIds = [];
                        resetBtnRepeater($('#UpdateFileButtonsRows'), $('#UpdateFileButtonsEmpty'));

                        loadFileButtons(d.id, btns => {
                            btns.forEach(b => {
                                const $rows = $('#UpdateFileButtonsRows');
                                const $empty = $('#UpdateFileButtonsEmpty');
                                $rows.append(buildBtnRow(b));
                                toggleBtnRepeaterEmpty($rows, $empty);
                            });

                            AdminCore.finishLoading(400, () => $('#updateFileModal').modal('show'));
                        });
                    } else {
                        AdminCore.finishLoading(400, () => Swal.fire('Erro!', r && r.message || 'Erro ao carregar.', 'error'));
                    }
                })
                .fail(() => AdminCore.finishLoading(400, () => Swal.fire('Erro!', 'Erro de comunicação.', 'error')));
        }
        /* ==================================================================== */
        /* ACTIONS                                                              */
        /* ==================================================================== */
        function confirmDelete(message, onConfirm) {
            Swal.fire({
                title: 'Você tem certeza?',
                text: message || 'Esta ação não pode ser desfeita!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Sim, excluir!',
                cancelButtonText: 'Cancelar'
            }).then(r => {
                if (r.isConfirmed) onConfirm();
            });
        }

        function doAjaxAction(url, data, onSuccess, successMsg, errorMsg) {
            ajax({
                    url,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        csrf_token: CSRF,
                        ...data
                    }
                }, false)
                .done(r => {
                    if (r && r.success && onSuccess) onSuccess(r);
                    toast(
                        (r && r.toast_type) || (r && r.success ? 'success' : 'error'),
                        (r && r.message) || (r && r.success ? successMsg : errorMsg)
                    );
                })
                .fail(xhr => toast('error', (xhr && xhr.responseJSON && xhr.responseJSON.message) || errorMsg));
        }

        function toggleSection(id, next) {
            doAjaxAction(
                BASE_URL + 'painel/togglePageSectionActive', {
                    id,
                    active: next
                },
                () => loadSections(id),
                'Status atualizado!',
                'Erro ao atualizar.'
            );
        }

        function deleteSection(id) {
            confirmDelete('Todos os modelos e conteúdos desta seção serão excluídos!', () => {
                doAjaxAction(
                    BASE_URL + 'painel/deletePageSection/' + id, {},
                    () => {
                        const rem = state.sections.filter(s => Number(s.id) !== Number(id));
                        loadSections(rem.length ? Number(rem[0].id) : null);
                    },
                    'Seção excluída!',
                    'Erro ao excluir.'
                );
            });
        }

        function toggleModel(id, next, sId) {
            doAjaxAction(
                BASE_URL + 'painel/togglePageSectionModelActive', {
                    id,
                    active: next
                },
                () => loadSections(sId || state.selectedSectionId),
                'Status atualizado!',
                'Erro ao atualizar.'
            );
        }

        function deleteModel(id, sId) {
            confirmDelete('Todos os conteúdos deste modelo serão excluídos!', () => {
                doAjaxAction(
                    BASE_URL + 'painel/deletePageSectionModel/' + id, {},
                    () => loadSections(sId || state.selectedSectionId),
                    'Modelo excluído!',
                    'Erro ao excluir.'
                );
            });
        }

        function toggleTextItem(id, next, mId) {
            doAjaxAction(
                BASE_URL + 'painel/togglePageTextItemActive', {
                    id,
                    active: next
                },
                () => renderModelBodyById(mId),
                'Status atualizado!',
                'Erro ao atualizar.'
            );
        }

        function deleteTextItem(id, mId) {
            confirmDelete('O texto será excluído permanentemente.', () => {
                doAjaxAction(
                    BASE_URL + 'painel/deletePageTextItem/' + id, {},
                    () => renderModelBodyById(mId),
                    'Texto excluído!',
                    'Erro ao excluir.'
                );
            });
        }

        function toggleFolder(id, next, mId) {
            doAjaxAction(
                BASE_URL + 'painel/togglePageFolderActive', {
                    id,
                    active: next
                },
                () => renderModelBodyById(mId),
                'Status atualizado!',
                'Erro ao atualizar.'
            );
        }

        function deleteFolder(id, mId) {
            confirmDelete('A pasta e todo seu conteúdo serão excluídos!', () => {
                doAjaxAction(
                    BASE_URL + 'painel/deletePageFolder/' + id, {},
                    () => renderModelBodyById(mId),
                    'Pasta excluída!',
                    'Erro ao excluir.'
                );
            });
        }

        function toggleFile(id, next, mId) {
            doAjaxAction(
                BASE_URL + 'painel/togglePageFileActive', {
                    id,
                    active: next
                },
                () => renderModelBodyById(mId),
                'Status atualizado!',
                'Erro ao atualizar.'
            );
        }

        function deleteFile(id, mId) {
            confirmDelete('O arquivo será excluído permanentemente.', () => {
                doAjaxAction(
                    BASE_URL + 'painel/deletePageFile/' + id, {},
                    () => renderModelBodyById(mId),
                    'Arquivo excluído!',
                    'Erro ao excluir.'
                );
            });
        }
        /* ==================================================================== */
        /* EVENTS                                                               */
        /* ==================================================================== */
        ensureFilePreviewMarkup();
        $('#createModelModal').on('shown.bs.modal', function() {
            ensureTiny('CreateModelDescription');
        });
        $('#updateModelModal').on('shown.bs.modal', function() {
            ensureTiny('UpdateModelDescription');
        });
        $('#createTextItemModal').on('shown.bs.modal', function() {
            ensureTiny('CreateTextItemContent');
        });
        $('#updateTextItemModal').on('shown.bs.modal', function() {
            ensureTiny('UpdateTextItemContent');
        });
        $('#createFolderModal').on('shown.bs.modal', function() {
            ensureTiny('CreateFolderDescription');
        });
        $('#updateFolderModal').on('shown.bs.modal', function() {
            ensureTiny('UpdateFolderDescription');
        });
        $('#createFileModal').on('shown.bs.modal', function() {
            ensureTiny('CreateFileDescription');
        });
        $('#updateFileModal').on('shown.bs.modal', function() {
            ensureTiny('UpdateFileDescription');
        });
        $('#createFileModal').on('hidden.bs.modal', function() {
            revokePreviewUrl('create');
            clearFilePreview('create', 'Nenhum arquivo selecionado.');
            $('#CreateFileUpload').val('');
            setTinyValue('CreateFileDescription', '');
        });
        $('#updateFileModal').on('hidden.bs.modal', function() {
            revokePreviewUrl('update');
            clearFilePreview('update', 'Nenhum arquivo carregado.');
            $('#UpdateFileUpload').val('');
        });
        $('#CreateFileUpload').on('change', function() {
            previewSelectedLocalFile(this, 'create');
        });
        $('#UpdateFileUpload').on('change', function() {
            previewSelectedLocalFile(this, 'update');
        });
        $('#btnCreateSection').on('click', openCreateSection);
        $('#sectionsList').on('click', '.js-select-section', function() {
            const id = Number($(this).data('id'));
            if (id > 0) {
                state.selectedSectionId = id;
                renderSectionsList();
            }
        });
        $('#sectionsList').on('keydown', '.js-select-section', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).trigger('click');
            }
        });
        $('#sectionDetailPanel').on('click', '.btnToggleModelCollapse', function(e) {
            e.preventDefault();
            e.stopPropagation();
            const target = $(this).data('target');
            $(target).collapse('toggle');
        });
        $('#sectionDetailPanel').on('shown.bs.collapse', '.pc-model-collapse', function() {
            const $collapse = $(this);
            const modelId = Number($collapse.data('model-id'));
            const $btn = $('.btnToggleModelCollapse[data-target="#' + this.id + '"]');
            setModelExpanded(modelId, true);
            $btn.attr('aria-expanded', 'true');
            $btn.attr('title', 'Recolher modelo');
            $btn.find('i').removeClass('fa-chevron-right').addClass('fa-chevron-down');
            const $body = $('#mbody_' + modelId);
            if ($body.attr('data-loaded') !== '1') {
                renderModelBodyById(modelId);
            }
        });
        $('#sectionDetailPanel').on('hidden.bs.collapse', '.pc-model-collapse', function() {
            const $collapse = $(this);
            const modelId = Number($collapse.data('model-id'));
            const $btn = $('.btnToggleModelCollapse[data-target="#' + this.id + '"]');
            setModelExpanded(modelId, false);
            $btn.attr('aria-expanded', 'false');
            $btn.attr('title', 'Expandir modelo');
            $btn.find('i').removeClass('fa-chevron-down').addClass('fa-chevron-right');
        });
        $('#sectionDetailPanel').on('click', '.js-folder-toggle', function(e) {
            if ($(e.target).closest('.js-no-toggle').length) return;
            const $head = $(this);
            const colId = $head.data('collapse-target');
            const $col = $('#' + colId);
            const $node = $head.closest('.pc-folder-node');
            const opening = !$col.hasClass('show');
            if (opening) {
                const modelId = Number($col.data('model-id'));
                const folderId = Number($col.data('folder-id'));
                const isTree = Number($col.data('is-tree')) === 1;
                const depth = Number($col.data('depth') || 0);
                setFolderExpanded(modelId, folderId, true);
                $head.attr('aria-expanded', 'true');
                $node.addClass('is-open');
                $head.find('.pc-folder-icon').removeClass('fa-folder').addClass('fa-folder-open');
                $col.collapse('show');
                loadFolderBody(modelId, folderId, isTree, depth);
            } else {
                const modelId = Number($col.data('model-id'));
                const folderId = Number($col.data('folder-id'));
                setFolderExpanded(modelId, folderId, false);
                $head.attr('aria-expanded', 'false');
                $node.removeClass('is-open');
                $head.find('.pc-folder-icon').removeClass('fa-folder-open').addClass('fa-folder');

                $col.collapse('hide');
            }
        });
        /* ------- Section actions -------------------------------------------- */
        $('#createSectionForm').on('submit', function(e) {
            e.preventDefault();
            const fd = new FormData(this);
            ajax({
                    url: BASE_URL + 'painel/createPageSection',
                    type: 'POST',
                    data: fd,
                    contentType: false,
                    processData: false,
                    dataType: 'json'
                }, {
                    title: 'Salvando seção...',
                    minTimeMs: 400,
                    autoClose: true
                })
                .done(d => {
                    if (d && d.success) {
                        $('#createSectionModal').modal('hide');
                        loadSections(d.id || null);
                    }
                    toast((d && d.toast_type) || (d && d.success ? 'success' : 'error'), (d && d.message) || (d && d.success ? 'Seção criada!' : 'Erro ao criar.'));
                })
                .fail(xhr => toast('warning', (xhr && xhr.responseJSON && xhr.responseJSON.message) || 'Erro ao criar seção.'));
        });
        $('#updateSectionForm').on('submit', function(e) {
            e.preventDefault();
            const cId = Number($('#UpdateSectionId').val() || 0);
            const fd = new FormData(this);
            ajax({
                    url: BASE_URL + 'painel/updatePageSection',
                    type: 'POST',
                    data: fd,
                    contentType: false,
                    processData: false,
                    dataType: 'json'
                }, {
                    title: 'Atualizando...',
                    minTimeMs: 400,
                    autoClose: true
                })
                .done(d => {
                    if (d && d.success) {
                        $('#updateSectionModal').modal('hide');
                        loadSections(cId);
                    }
                    toast((d && d.toast_type) || (d && d.success ? 'success' : 'error'), (d && d.message) || (d && d.success ? 'Seção atualizada!' : 'Erro ao atualizar.'));
                })
                .fail(xhr => toast('warning', (xhr && xhr.responseJSON && xhr.responseJSON.message) || 'Erro ao atualizar seção.'));
        });
        $('#sectionDetailPanel').on('click', '.btnDetailEditSection', function() {
            openEditSection(Number($(this).data('id')));
        });
        $('#sectionDetailPanel').on('click', '.btnDetailToggleSection', function() {
            toggleSection(Number($(this).data('id')), Number($(this).data('next')));
        });
        $('#sectionDetailPanel').on('click', '.btnDetailDeleteSection', function() {
            deleteSection(Number($(this).data('id')));
        });
        $('#sectionDetailPanel').on('click', '.btnDetailAddModel', function() {
            openCreateModel(Number($(this).data('section-id')));
        });
        /* ------- Model actions ---------------------------------------------- */
        $('#createModelForm').on('submit', function(e) {
            e.preventDefault();
            syncTinyMany(['CreateModelDescription']);
            const sId = Number($('#CreateModelSectionId').val() || 0);
            const fd = new FormData(this);
            ajax({
                    url: BASE_URL + 'painel/createPageSectionModel',
                    type: 'POST',
                    data: fd,
                    contentType: false,
                    processData: false,
                    dataType: 'json'
                }, {
                    title: 'Salvando modelo...',
                    minTimeMs: 400,
                    autoClose: true
                })
                .done(d => {
                    if (d && d.success) {
                        $('#createModelModal').modal('hide');
                        loadSections(sId);
                    }
                    toast((d && d.toast_type) || (d && d.success ? 'success' : 'error'), (d && d.message) || (d && d.success ? 'Modelo criado!' : 'Erro ao criar.'));
                })
                .fail(xhr => toast('warning', (xhr && xhr.responseJSON && xhr.responseJSON.message) || 'Erro ao criar modelo.'));
        });
        $('#updateModelForm').on('submit', function(e) {
            e.preventDefault();
            syncTinyMany(['UpdateModelDescription']);
            const sId = Number($('#UpdateModelSectionId').val() || state.selectedSectionId || 0);
            const fd = new FormData(this);
            ajax({
                    url: BASE_URL + 'painel/updatePageSectionModel',
                    type: 'POST',
                    data: fd,
                    contentType: false,
                    processData: false,
                    dataType: 'json'
                }, {
                    title: 'Atualizando modelo...',
                    minTimeMs: 400,
                    autoClose: true
                })
                .done(d => {
                    if (d && d.success) {
                        $('#updateModelModal').modal('hide');
                        loadSections(sId);
                    }
                    toast((d && d.toast_type) || (d && d.success ? 'success' : 'error'), (d && d.message) || (d && d.success ? 'Modelo atualizado!' : 'Erro ao atualizar.'));
                })
                .fail(xhr => toast('warning', (xhr && xhr.responseJSON && xhr.responseJSON.message) || 'Erro ao atualizar modelo.'));
        });
        $('#sectionDetailPanel').on('click', '.btnEditModel', function() {
            openEditModel(Number($(this).data('id')));
        });
        $('#sectionDetailPanel').on('click', '.btnToggleModel', function() {
            const id = Number($(this).data('id'));
            const next = Number($(this).data('next'));
            const m = getModelById(id);
            toggleModel(id, next, m ? Number(m.section_id) : state.selectedSectionId);
        });
        $('#sectionDetailPanel').on('click', '.btnDeleteModel', function() {
            const id = Number($(this).data('id'));
            const m = getModelById(id);
            deleteModel(id, m ? Number(m.section_id) : state.selectedSectionId);
        });
        $('#sectionDetailPanel').on('click', '.btnModelAddItem', function() {
            const mId = Number($(this).data('id'));
            const type = String($(this).data('model-type') || '');
            if (type === 'text') openCreateTextItem(mId);
            else if (type === 'file_list') openCreateFile(mId, null, 'Raiz');
            else if (type === 'folder_files' || type === 'folder_tree') openCreateFolder(mId, null, 'Raiz', false);
        });
        /* ------- Text item actions ------------------------------------------ */
        $('#createTextItemForm').on('submit', function(e) {
            e.preventDefault();
            syncTinyMany(['CreateTextItemContent']);
            const mId = Number($('#CreateTextItemSectionModelId').val() || 0);
            const fd = new FormData(this);
            ajax({
                    url: BASE_URL + 'painel/createPageTextItem',
                    type: 'POST',
                    data: fd,
                    contentType: false,
                    processData: false,
                    dataType: 'json'
                }, {
                    title: 'Salvando texto...',
                    minTimeMs: 400,
                    autoClose: true
                })
                .done(d => {
                    if (d && d.success) {
                        $('#createTextItemModal').modal('hide');
                        renderModelBodyById(mId);
                    }
                    toast((d && d.toast_type) || (d && d.success ? 'success' : 'error'), (d && d.message) || (d && d.success ? 'Texto criado!' : 'Erro ao criar.'));
                })
                .fail(xhr => toast('warning', (xhr && xhr.responseJSON && xhr.responseJSON.message) || 'Erro ao criar texto.'));
        });
        $('#updateTextItemForm').on('submit', function(e) {
            e.preventDefault();
            syncTinyMany(['UpdateTextItemContent']);
            const mId = Number($('#UpdateTextItemModelId').val() || 0);
            const fd = new FormData(this);
            ajax({
                    url: BASE_URL + 'painel/updatePageTextItem',
                    type: 'POST',
                    data: fd,
                    contentType: false,
                    processData: false,
                    dataType: 'json'
                }, {
                    title: 'Atualizando texto...',
                    minTimeMs: 400,
                    autoClose: true
                })
                .done(d => {
                    if (d && d.success) {
                        $('#updateTextItemModal').modal('hide');
                        renderModelBodyById(mId);
                    }
                    toast((d && d.toast_type) || (d && d.success ? 'success' : 'error'), (d && d.message) || (d && d.success ? 'Texto atualizado!' : 'Erro ao atualizar.'));
                })
                .fail(xhr => toast('warning', (xhr && xhr.responseJSON && xhr.responseJSON.message) || 'Erro ao atualizar texto.'));
        });
        $('#sectionDetailPanel').on('click', '.btnEditTextItem', function() {
            openEditTextItem(Number($(this).data('id')), Number($(this).data('model-id')));
        });
        $('#sectionDetailPanel').on('click', '.btnToggleTextItem', function() {
            toggleTextItem(Number($(this).data('id')), Number($(this).data('next')), Number($(this).data('model-id')));
        });
        $('#sectionDetailPanel').on('click', '.btnDeleteTextItem', function() {
            deleteTextItem(Number($(this).data('id')), Number($(this).data('model-id')));
        });
        /* ------- Folder actions --------------------------------------------- */
        $('#createFolderForm').on('submit', function(e) {
            e.preventDefault();
            syncTinyMany(['CreateFolderDescription']);
            const mId = Number($('#CreateFolderSectionModelId').val() || 0);
            const fd = new FormData(this);
            ajax({
                    url: BASE_URL + 'painel/createPageFolder',
                    type: 'POST',
                    data: fd,
                    contentType: false,
                    processData: false,
                    dataType: 'json'
                }, {
                    title: 'Salvando pasta...',
                    minTimeMs: 400,
                    autoClose: true
                })
                .done(d => {
                    if (d && d.success) {
                        $('#createFolderModal').modal('hide');
                        renderModelBodyById(mId);
                    }
                    toast((d && d.toast_type) || (d && d.success ? 'success' : 'error'), (d && d.message) || (d && d.success ? 'Pasta criada!' : 'Erro ao criar.'));
                })
                .fail(xhr => toast('warning', (xhr && xhr.responseJSON && xhr.responseJSON.message) || 'Erro ao criar pasta.'));
        });
        $('#updateFolderForm').on('submit', function(e) {
            e.preventDefault();
            syncTinyMany(['UpdateFolderDescription']);
            const mId = Number($('#UpdateFolderModelId').val() || 0);
            const fd = new FormData(this);
            ajax({
                    url: BASE_URL + 'painel/updatePageFolder',
                    type: 'POST',
                    data: fd,
                    contentType: false,
                    processData: false,
                    dataType: 'json'
                }, {
                    title: 'Atualizando pasta...',
                    minTimeMs: 400,
                    autoClose: true
                })
                .done(d => {
                    if (d && d.success) {
                        $('#updateFolderModal').modal('hide');
                        renderModelBodyById(mId);
                    }
                    toast((d && d.toast_type) || (d && d.success ? 'success' : 'error'), (d && d.message) || (d && d.success ? 'Pasta atualizada!' : 'Erro ao atualizar.'));
                })
                .fail(xhr => toast('warning', (xhr && xhr.responseJSON && xhr.responseJSON.message) || 'Erro ao atualizar pasta.'));
        });
        $('#sectionDetailPanel').on('click', '.btnAddFolder', function() {
            const mId = Number($(this).data('model-id'));
            const pIdRaw = $(this).data('parent-id');
            const pId = (pIdRaw === '' || pIdRaw == null) ? null : Number(pIdRaw);
            const pTitle = $(this).data('parent-title') || 'Raiz';
            const isSub = !!$(this).data('is-subfolder');

            if (mId > 0) openCreateFolder(mId, pId, pTitle, isSub);
        });
        $('#sectionDetailPanel').on('click', '.btnEditFolder', function() {
            openEditFolder(Number($(this).data('id')), Number($(this).data('model-id')));
        });
        $('#sectionDetailPanel').on('click', '.btnToggleFolder', function() {
            toggleFolder(Number($(this).data('id')), Number($(this).data('next')), Number($(this).data('model-id')));
        });
        $('#sectionDetailPanel').on('click', '.btnDeleteFolder', function() {
            deleteFolder(Number($(this).data('id')), Number($(this).data('model-id')));
        });
        /* ------- File actions ----------------------------------------------- */
        $('#createFileForm').on('submit', function(e) {
            e.preventDefault();
            syncTinyMany(['CreateFileDescription']);
            const mId = Number($('#CreateFileSectionModelId').val() || 0);
            const fd = new FormData(this);
            ajax({
                    url: BASE_URL + 'painel/createPageFile',
                    type: 'POST',
                    data: fd,
                    contentType: false,
                    processData: false,
                    dataType: 'json'
                }, {
                    title: 'Salvando arquivo...',
                    minTimeMs: 400,
                    autoClose: true
                })
                .done(d => {
                    if (!(d && d.success)) {
                        toast((d && d.toast_type) || 'error', (d && d.message) || 'Falha ao criar.');
                        return;
                    }

                    syncCreatedFileBtns(extractResponseId(d))
                        .then(() => {
                            $('#createFileModal').modal('hide');
                            renderModelBodyById(mId);
                            toast((d.toast_type) || 'success', d.message || 'Arquivo criado!');
                        })
                        .catch(() => {
                            $('#createFileModal').modal('hide');
                            renderModelBodyById(mId);
                            toast('warning', 'Arquivo criado, mas houve erro em um ou mais botões.');
                        });
                })
                .fail(xhr => toast('warning', (xhr && xhr.responseJSON && xhr.responseJSON.message) || 'Erro ao criar arquivo.'));
        });
        $('#updateFileForm').on('submit', function(e) {
            e.preventDefault();
            syncTinyMany(['UpdateFileDescription']);
            const mId = Number($('#UpdateFileModelId').val() || 0);
            const fileId = Number($('#UpdateFileId').val() || 0);
            const fd = new FormData(this);
            ajax({
                    url: BASE_URL + 'painel/updatePageFile',
                    type: 'POST',
                    data: fd,
                    contentType: false,
                    processData: false,
                    dataType: 'json'
                }, {
                    title: 'Atualizando arquivo...',
                    minTimeMs: 400,
                    autoClose: true
                })
                .done(d => {
                    if (!(d && d.success)) {
                        toast((d && d.toast_type) || 'error', (d && d.message) || 'Falha ao atualizar.');
                        return;
                    }

                    syncUpdatedFileBtns(fileId)
                        .then(() => {
                            $('#updateFileModal').modal('hide');
                            renderModelBodyById(mId);
                            toast((d.toast_type) || 'success', d.message || 'Arquivo atualizado!');
                        })
                        .catch(() => {
                            $('#updateFileModal').modal('hide');
                            renderModelBodyById(mId);
                            toast('warning', 'Arquivo atualizado, mas houve erro em um ou mais botões.');
                        });
                })
                .fail(xhr => toast('warning', (xhr && xhr.responseJSON && xhr.responseJSON.message) || 'Erro ao atualizar arquivo.'));
        });
        $('#sectionDetailPanel').on('click', '.btnAddFile', function() {
            const mId = Number($(this).data('model-id'));
            const fIdRaw = $(this).data('folder-id');
            const fId = (fIdRaw === '' || fIdRaw == null) ? null : Number(fIdRaw);
            const fTitle = $(this).data('folder-title') || 'Raiz';
            if (mId > 0) openCreateFile(mId, fId, fTitle);
        });
        $('#sectionDetailPanel').on('click', '.btnEditFile', function() {
            openEditFile(Number($(this).data('id')), Number($(this).data('model-id')));
        });
        $('#sectionDetailPanel').on('click', '.btnToggleFileActive', function() {
            toggleFile(Number($(this).data('id')), Number($(this).data('next')), Number($(this).data('model-id')));
        });
        $('#sectionDetailPanel').on('click', '.btnDeleteFile', function() {
            deleteFile(Number($(this).data('id')), Number($(this).data('model-id')));
        });
        /* ------- File button repeater --------------------------------------- */
        $('#btnCreateFileAddButtonRow').on('click', function() {
            const $rows = $('#CreateFileButtonsRows');
            const $empty = $('#CreateFileButtonsEmpty');
            $rows.append(buildBtnRow({}));
            toggleBtnRepeaterEmpty($rows, $empty);
        });
        $('#btnUpdateFileAddButtonRow').on('click', function() {
            const $rows = $('#UpdateFileButtonsRows');
            const $empty = $('#UpdateFileButtonsEmpty');
            $rows.append(buildBtnRow({}));
            toggleBtnRepeaterEmpty($rows, $empty);
        });
        $('#CreateFileButtonsRows').on('click', '.js-remove-file-button-row', function() {
            $(this).closest('.pc-btn-repeater-row').remove();
            toggleBtnRepeaterEmpty($('#CreateFileButtonsRows'), $('#CreateFileButtonsEmpty'));
        });
        $('#UpdateFileButtonsRows').on('click', '.js-remove-file-button-row', function() {
            const $row = $(this).closest('.pc-btn-repeater-row');
            const btnId = Number($row.find('.js-file-btn-id').val() || 0);
            if (btnId > 0) state.updateFileRemovedButtonIds.push(btnId);
            $row.remove();
            toggleBtnRepeaterEmpty($('#UpdateFileButtonsRows'), $('#UpdateFileButtonsEmpty'));
        });
        /* ==================================================================== */
        /* BOOT                                                                 */
        /* ==================================================================== */
        ensureTinyMany(Object.keys(tinyConfigs));
        clearFilePreview('create', 'Nenhum arquivo selecionado.');
        clearFilePreview('update', 'Nenhum arquivo carregado.');
        loadSections();
    });
</script>