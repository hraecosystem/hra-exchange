<div class="btn-group">
    <button type="button" class="btn btn-toggle dropdown-toggle waves-effect shadow-none"
            data-bs-toggle="dropdown" aria-expanded="false">
            <i class="mdi mdi-dots-vertical"></i>
        </button>
        <div class="dropdown-menu">
{{--            @if(!$model->isBlocked())--}}
    {{--            <a class="dropdown-item" href="{{ route('admin.members.log', $model) }}" >--}}
    {{--                <i class='bx bx-file' ></i> Member Status Log--}}
    {{--            </a>--}}
                <a class="dropdown-item" href="{{ route('admin.members.edit', $model) }}" >
                    <i class="mdi mdi-circle-edit-outline me-2"></i> Edit
                </a>
                <form action="{{ route('admin.members.impersonate.store', $model) }}" method="post" target="_blank" class="noLoader">
                    @csrf
                    <a href="#" class="dropdown-item" onclick="$(this).parent('form').submit();">
                        <i class="mdi mdi-login-variant me-2"></i> Login User
                    </a>
                </form>
                <a class="dropdown-item" href="{{ route('admin.members.change-password.edit', $model) }}">
                    <i class="mdi mdi-lock-check me-2"></i> Change Password
                </a>
{{--                <form action="{{ route('admin.members.block.store', $model) }}" method="post">--}}
{{--                    @csrf--}}
{{--                    <button class="dropdown-item" href="#">--}}
{{--                        <i class="mdi mdi-block-helper me-2"></i>&nbsp;Block--}}
{{--                    </button>--}}
{{--                </form>--}}
{{--            @else--}}
{{--                <form action="{{ route('admin.members.block.destroy', $model) }}"--}}
{{--                      method="post">--}}
{{--                    @csrf--}}
{{--                    @method('delete')--}}
{{--                    <button class="dropdown-item" href="#">--}}
{{--                        <i class="mdi mdi-account-cancel  mr-2"></i>&nbsp;UnBlock--}}
{{--                    </button>--}}
{{--                </form>--}}
{{--            @endif--}}
        </div>
    </div>
