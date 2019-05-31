<script src="https://unpkg.com/imask"></script>
{$js}

{if $id == 0 }
    <h2>Добавление</h2>
{else}
    <h2>Редактирование</h2>
{/if}

<form method="post" id="fmEdit" action="/">
    <input type="hidden" name="profileId" id="profileId" value="{$id}" >
    <input type="hidden" name="emailsMain" id="emailsMain" >
    <input type="hidden" name="phonesMain" id="phonesMain" >
    <div class="form-group">
        <label for="inpSurname">Фамилия</label>
        <input type="text" class="form-control" name="surname[{$id}]" id="inpSurname" placeholder="Фамилия" required="required" value="{if isset($profiles[0])}{$profiles[0]['surname']}{/if}">
    </div>

    <div class="form-group">
        <label for="inpName">Имя</label>
        <input type="text" class="form-control" name="name[{$id}]" id="inpName" placeholder="Имя" required="required" value="{if isset($profiles[0])}{$profiles[0]['name']}{/if}">
    </div>

    <div class="form-group">
        <label for="inpPatronymic">Отчество</label>
        <input type="text" class="form-control" name="patronymic[{$id}]" id="inpPatronymic" placeholder="Отчество" required="required" value="{if isset($profiles[0])}{$profiles[0]['patronymic']}{/if}">
    </div>

    <div class="form-group">
        <label>E-mail <a href="javascript:void(0)" onclick="addEmail({$id});"><i class="fas fa-plus"></i></a></label>
        <div class="emails">
            {if isset($profiles[0]['emails']) && count($profiles[0]['emails'])>0}
                {foreach from=$profiles[0]['emails'] item=email key=key}
                    {assign var="key1" value=$key+1}
                    <div class="email {if $email['main'] == '1'} main{/if}" data-email-id="{$key1}">
                        <input type="email" class="form-control email-inp" value="{$email['email']}" name="email[{$id}][{$email['id']}]">
                        <a class="email-main" href="javascript:void(0)" onclick="setMainEmail(this);"><i class="fas fa-check"></i></a>
                        <a class="email-del" href="javascript:void(0)" onclick="if (confirm('Вы уверены, что хотите удалить?')) deleteEmail(event);"><i class="fas fa-times"></i></a>
                    </div>
                {/foreach}
            {else}
                <div class="email main" data-email-id="1">
                    <input type="email" class="form-control email-inp" value="" name="email[0][add][]">
                    <a class="email-main" href="javascript:void(0)" onclick="setMainEmail(this);" ><i class="fas fa-check"></i></a>
                    <a class="email-del" href="#" onclick="if (confirm('Вы уверены, что хотите удалить?')) deleteEmail(event);"><i class="fas fa-times"></i></a>
                </div>
            {/if}
        </div>
    </div>

    <div class="form-group">
        <label>Телефоны <a href="javascript:void(0)" onclick="addPhone({$id});"><i class="fas fa-plus"></i></a></label>
        <div class="phones">
            {if isset($profiles[0]['phones']) && count($profiles[0]['phones'])>0}
                {foreach from=$profiles[0]['phones'] item=phone key=key}
                    {assign var="key1" value=$key+1}
                    <div class="row phone {if $phone['main'] == '1'} main{/if}" data-phone-id="{$key1}">
                        <div class="col-12 col-md-6">
                            <input type="tel" class="form-control phone-inp" value="{$phone['phone']}" name="phone[{$id}][{$phone['id']}]">
                            <a class="email-main" href="javascript:void(0)" onclick="setMainPhone(this);"><i class="fas fa-check"></i></a>
                            <a class="email-del" href="javascript:void(0)" onclick="if (confirm('Вы уверены, что хотите удалить?')) deletePhone(event);"><i class="fas fa-times"></i></a>
                        </div>
                        <div class="col-12 col-md-6">
                            <select class="form-control" name="phone_type[{$id}][{$phone['id']}]"  required="required">
                                {foreach from=$phone_types item=phone_type }
                                    <option value="{$phone_type['id']}" {if $phone['phone_type']['id'] == $phone_type['id']}selected{/if}>{$phone_type['name']}</option>
                                {/foreach}
                            </select>
                        </div>
                    </div>
                {/foreach}
            {else}
                <div class="row phone main" data-phone-id="1">
                    <div class="col-12 col-md-6">
                        <input type="tel" class="form-control phone-inp" value="" name="phone[0][add][]">
                        <a class="email-main" href="javascript:void(0)" onclick="setMainPhone(this);"><i class="fas fa-check"></i></a>
                        <a class="email-del" href="javascript:void(0)" onclick="if (confirm('Вы уверены, что хотите удалить?')) deletePhone(event);"><i class="fas fa-times"></i></a>
                    </div>
                    <div class="col-12 col-md-6">
                        <select class="form-control" name="phone_type[0][add][]" required="required" >
                            {foreach from=$phone_types item=phone_type }
                                <option value="{$phone_type['id']}">{$phone_type['name']}</option>
                            {/foreach}
                        </select>
                    </div>
                </div>
            {/if}
        </div>

    </div>
    <div class="row buttons-edit">
        <div class="col-7 col-md-3 text-left text-md-left">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Сохранить</button>
        </div>
        <div class="col-5 col-md-3 text-right text-md-left">
            <a href="/" class="btn btn-secondary"><i class="fas fa-ban"></i> Назад</a>
        </div>
    </div>
</form>
<br>