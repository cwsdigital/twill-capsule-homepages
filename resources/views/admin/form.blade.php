@extends('twill::layouts.form', [
    'additionalFieldsets' => [
        ['fieldset' => 'metadata', 'label' => 'SEO'],
    ]
])

@section('contentFields')
    @include('Base.resources.views.admin.fields.heading')

    @formField('input', [
        'name' => 'subheading',
        'label' => 'Sub Heading',
        'maxlength' => 100
    ])

    @formField('block_editor')
@stop

@section('fieldsets')
    @metadataFields
@stop
