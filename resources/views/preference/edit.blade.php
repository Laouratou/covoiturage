<section class="bg-gray-100">
    <div class="container mx-auto">
        <div class="max-w-md mx-auto bg-white shadow p-8 rounded-lg">
            <h2 class="text-2xl font-bold mb-4">{{ __('Modifier vos préférences') }}</h2>

            <form method="POST" action="{{ route('preferences.update') }}" class="space-y-4">
                @csrf
                @method('PUT')

                <!-- Champs de formulaire pour les préférences -->
                <div>
                    <label for="espace_bagage" class="block text-sm font-medium text-gray-700">{{ __('Espace bagage') }}</label>
                    <input id="espace_bagage" type="text" name="espace_bagage" value="{{ $preference->espace_bagage }}" required class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500">
                    @error('espace_bagage')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="nmbre_passager" class="block text-sm font-medium text-gray-700">{{ __('Nombre de passagers') }}</label>
                    <input id="nmbre_passager" type="number" name="nmbre_passager" value="{{ $preference->nmbre_passager }}" required class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500">
                    @error('nmbre_passager')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Ajoutez les autres champs de formulaire pour les préférences -->

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">{{ __('Mettre à jour') }}</button>
                </div>
            </form>
        </div>
    </div>
</section>
