<label style="cursor: pointer; background-color: {{ $label->color }}; opacity: 0.9;" for="labelCheckbox{{ $label->id }}" class="btn btn-primary px-1 py-0"><input class="hidden-checkbox" type="checkbox" name="labels[]" value="{{ $label->id }}" id="labelCheckbox{{ $label->id }}" {{ ($checkedLabels && $checkedLabels->contains($label->id)) ? 'checked' : '' }}><span class="badge p-0 mr-1" style="background-color: rgba(255, 255, 255, 0.9); width: 15px;">&check;</span>{{ $label->name }}</label>