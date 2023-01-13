@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.spaces-type.actions.edit', ['name' => $spacesType->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <spaces-type-form
                :action="'{{ $spacesType->resource_url }}'"
                :data="{{ $spacesType->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.spaces-type.actions.edit', ['name' => $spacesType->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.spaces-type.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </spaces-type-form>

        </div>
    
</div>

@endsection