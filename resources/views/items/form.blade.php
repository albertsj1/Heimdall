    <section class="module-container">
        <header>
            <div class="section-title">{{ __('app.apps.add_application') }}</div>
            <div class="module-actions">
                <button type="submit"class="button"><i class="fa fa-save"></i><span>{{ __('app.buttons.save') }}</span></button>
                <a href="{{ route('items.index', [], false) }}" class="button"><i class="fa fa-ban"></i><span>{{ __('app.buttons.cancel') }}</span></a>
            </div>
        </header>
        <div id="create" class="create">
            {!! csrf_field() !!}

            <div class="input">
                <label>{{ __('app.apps.application_name') }} *</label>
                {!! Form::text('title', null, array('placeholder' => __('app.apps.title'), 'id' => 'appname', 'class' => 'form-control')) !!}
                <hr />
                <label>{{ strtoupper(__('app.url')) }}</label>
                {!! Form::text('url', null, array('placeholder' => __('app.url'), 'id' => 'appurl', 'class' => 'form-control')) !!}
                <hr />
                <label>{{ __('app.apps.pinned') }}</label>
                {!! Form::hidden('pinned', '0') !!}
                <label class="switch">
                    <?php
                    $checked = false;
                    if(isset($item->pinned) && (bool)$item->pinned === true) $checked = true;
                    $set_checked = ($checked) ? ' checked="checked"' : '';
                    ?>                   
                    <input type="checkbox" name="pinned" value="1"<?php echo $set_checked;?> />
                    <span class="slider round"></span>
                </label>

            </div>
            <div class="input">
                <label>{{ __('app.apps.colour') }} *</label>
                {!! Form::text('colour', null, array('placeholder' => __('app.apps.hex'),'class' => 'form-control color-picker')) !!}
                <hr />
                <label>{{ __('app.apps.tags') }} ({{ __('app.optional') }})</label>
                {!! Form::select('tags', $tags, $current_tags, ['class' => 'tags', 'multiple']) !!}
            </div>
            <div class="input">
                <label>{{ __('app.apps.icon') }}</label>
                <div class="icon-container">
                    <div id="appimage">
                    @if(isset($item->icon) && !empty($item->icon) || old('icon'))
                    <?php
                        if(isset($item->icon)) $icon = $item->icon;
                        else $icon = old('icon');
                    ?>
                    <img src="{{ asset('storage/'.$icon) }}" />
                    {!! Form::hidden('icon', $icon, ['class' => 'form-control']) !!}
                    @else
                    <img src="/img/heimdall-icon-small.png" />
                    @endif
                    </div>
                    <div class="upload-btn-wrapper">
                        <button class="btn">{{ __('app.buttons.upload')}} </button>
                        <input type="file" id="upload" name="file" />
                    </div>
                </div>
            </div>
            
            @if(isset($item) && isset($item->config->view))
            <div id="sapconfig" style="display: block;">
                @if(isset($item))
                @include('supportedapps.'.$item->config->view)
                @endif
            </div>
            @else
            <div id="sapconfig"></div>
            @endif
            
        </div>
        <footer>
            <div class="section-title">&nbsp;</div>
            <div class="module-actions">
                <button type="submit"class="button"><i class="fa fa-save"></i><span>{{ __('app.buttons.save') }}</span></button>
                <a href="{{ route('items.index', [], false) }}" class="button"><i class="fa fa-ban"></i><span>{{ __('app.buttons.cancel') }}</span></a>
            </div>
        </footer>

    </section>


