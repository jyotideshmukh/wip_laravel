<x-layout>
    <x-slot name="content">
        <h2>Medical History</h2>


        <form class="row g-3" method="post" action="{{ route('app.storeMedicalHistory') }}">
            @csrf

            @foreach($medicalHistories as $history)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="medicalHistory_{{ $loop->index }}" value="{{ $history->id }}" id="medicalHistory_{{ $loop->index }}">
                <label class="form-check-label" for="medicalHistory_{{ $loop->index }}">{{ $history->name }}</label>
            </div>
            @endforeach

            <div class="row mb-3">
                <label for="usCitizenYes" class="col-sm-2 col-form-label">Your family medical history?</label>
                <p>Do either of your natural parents or any siblings have a history of cancer, stroke, or hear disorder
                    before age 60?</p>
                <div class="col-sm-5">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_family_history_positive" id="familyHistoryPositiveYes">
                        <label class="form-check-label" for="familyHistoryPositiveYes">Yes</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_family_history_positive" id="familyHistoryPositiveNo">
                        <label class="form-check-label" for="familyHistoryPositiveNo">No</label>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <button type="button" class="btn btn-dark">Back</button>
                <button type="submit" class="btn btn-primary">Next</button>
            </div>

        </form>
    </x-slot>
</x-layout>