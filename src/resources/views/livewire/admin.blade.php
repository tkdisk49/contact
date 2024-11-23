    <div>
        <button wire:click="openModal({{ $contact->id }})" type="button" class="detail">詳細</button>
    </div>
    @if($showModal)
    <div class="modal-content">
        <div class="modal-window">
            <button wire:click="closeModal()" type="button" class="modal-close">✕</button>
            <table class="modal-table">
                <tr class="modal-table__row">
                    <th class="modal-table__header">お名前</th>
                    <td class="modal-table__text">
                        {{ $last_name }}
                        <span class="space"></span>
                        <span class="first-name">
                            {{ $first_name }}
                        </span>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    @endif
    </div>