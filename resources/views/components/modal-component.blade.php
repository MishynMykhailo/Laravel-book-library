<div id="{{ $id }}" class="modal">
    <div class="modal-content {{$modalClass}}">
        <span data-close="{{ $closeId }}" class="close">&times;</span>
        <h2 class="modal-title">{{ $title }}</h2>
        <div>
            {{ $slot }}
        </div>
    </div>
</div>
<button class="{{$class}}" onclick="openModal('{{$id}}', '{{$closeId}}')">{{$title}}</button>

<script>

    class Modal {
        constructor(id, closeId) {
            this.modal = document.getElementById(id);
            this.closeBtn = document.querySelector(`[data-close="${closeId}"]`)
        }
        openModal() {
            this.modal.style.display = 'block';
        }
        closeModal() {
            this.modal.style.display = 'none';
        }
        init() {
            this.closeBtn.addEventListener('click', () => this.closeModal());
            window.addEventListener('click', (event) => {
                if (event.target === this.modal) {
                    this.closeModal();
                }
            });
        }
    }

    function openModal(modalId, closeId) {
        const modal = new Modal(modalId, closeId);
        modal.openModal();
        modal.init();
    }


</script>
