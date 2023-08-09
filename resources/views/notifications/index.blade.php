<section>
    <h1>Notifications</h1>

    <ul>
        @forelse ($notifications as $notification)
            <li>
                <a href="{{ route('notifications.show', $notification->id) }}">
                    {{ $notification->data['message'] ?? 'Notification message not available' }}
                </a>
            </li>
        @empty
            <li>Pas de notification.</li>
        @endforelse
    </ul>
</section>
