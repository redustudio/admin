@extends('reduvel-admin::layouts.base')

@section('body')
    <div class="container-fluid" style="margin-top: 10em;">
        <div class="row">
            <div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-sm-8 offset-sm-2">
                <div class="card">
                    <div class="card-block p-3">
                        <h4 class="card-title text-xs-center">{{ config('app.name') }}</h4>
                        <form>
                            <div class="form-group">
                                <label for="email">
                                    @lang('reduvel-admin::fields.email')
                                </label>
                                <input type="text" name="email" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label for="password">
                                    @lang('reduvel-admin::fields.password')
                                </label>
                                <input type="password" name="password" class="form-control"/>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                <input class="form-check-input" type="checkbox">
                                @lang('reduvel-admin::fields.remember_me')
                            </label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">
                                @lang('reduvel-admin::fields.login')
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
