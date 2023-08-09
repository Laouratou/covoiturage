<form action="{{ route('reservation.response', ['reservation' => $reservation]) }}" method="POST">
    @csrf
    <input type="hidden" name="status" value="accepter">
    <button type="submit">Accepter</button>
</form>

<form action="{{ route('reservation.response', ['reservation' => $reservation]) }}" method="POST">
    @csrf
    <input type="hidden" name="status" value="refuser">
    <button type="submit">Refuser</button>
</form>
