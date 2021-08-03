<div class="modal-wrapper <?= $title && $body ? 'opened' : '' ?>">
    <div class="modal">
        <div class="modal-block">
            <h2 class="modal__title"><?= $title ?></h2>
            <p class="modal__text"><?= $body ?></p>
            <button class="btn btn-additionally close"><span>Done</span></button>
        </div>
    </div>
</div>
<style>
    .modal-wrapper.opened, .modal-wrapper.opened .modal {
        display: block;
    }
</style>
<script>
    window.onload = () => {
        $('.modal-wrapper .close').on('click', function () {
            $('.modal-wrapper').removeClass('opened');
        })
    }
</script>
