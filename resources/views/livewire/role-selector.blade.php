<div class="form-group">
    <label for="role">Select Role:</label>
    <select id="role" wire:model="role">
        <option value=" user">User</option>
        <option value="admin">Admin</option>
    </select>
</div>
{{-- @if($role === 'admin'){
   Auth::user()->utype === 'ADM'
} --}}
