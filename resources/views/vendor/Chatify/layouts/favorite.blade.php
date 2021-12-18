<div class="favorite-list-item">
    <div data-id="{{ $user->id }}" data-action="0" class="avatar av-m"
        style="background-image: url('{{ asset('/storage/' . config('chatify.user_avatar.folder') . '/e7f8ef25-cb57-4d04-a1f8-ef993afb2147.png') }}');">
    </div>
    <p>{{ strlen($user->name) > 5 ? substr($user->name, 0, 6) . '..' : $user->name }}</p>
</div>
