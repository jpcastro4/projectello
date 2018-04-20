 var app = {


                news: function (message, typeNews) {

                    new Noty({
                        text: message,
                        layout: 'topRight',
                        type: typeNews,
                        timeout: '1000',
                        theme: 'metroui',
                        modal: true,
                        progressBar: false,
                    }).show();
                },

                loading: function (element, status) {

                    $(element).addClass('relative')

                    if (status == 'open') {

                        var loadHtml = '<div class="loading"><div class="sk-fading-circle">' +
                            '<div class="sk-circle1 sk-circle"></div>' +
                            '<div class="sk-circle2 sk-circle"></div>' +
                            '<div class="sk-circle3 sk-circle"></div>' +
                            '<div class="sk-circle4 sk-circle"></div>' +
                            '<div class="sk-circle5 sk-circle"></div>' +
                            '<div class="sk-circle6 sk-circle"></div>' +
                            '<div class="sk-circle7 sk-circle"></div>' +
                            '<div class="sk-circle8 sk-circle"></div>' +
                            '<div class="sk-circle9 sk-circle"></div>' +
                            '<div class="sk-circle10 sk-circle"></div>' +
                            '<div class="sk-circle11 sk-circle"></div>' +
                            '<div class="sk-circle12 sk-circle"></div>' +
                            '</div> </div>'

                        $(element).append(loadHtml)

                    }

                    if (status == 'close') {

                        $(element).find('.loading').remove()
                    }

                }
            }

            $(document).ready(function () {
        
                <? php if (!empty($mensagem)):  ?>
                    app.news('<?php echo $mensagem;?>', 'success')
                    <? php endif;?>
        
                <? php if (!empty($mensagem_erro)):  ?>
                    app.news('<?php echo $mensagem_erro;?>', 'error')
                    <? php endif;?>



                        setTimeout(function () {
                            $(".alert-fadeout").fadeOut();
                        }, 3000);
        
                
                
                <? php if (!empty($pg_coletores)):?>

                    $('.homologa').on('click', function (event) {

                        app.loading('.contain-card', 'open')

                        var deviceID = $(this).find('input').attr('data-deviceid'),
                            coletorStatus = $(this).find('input').attr('data-coletorstatus')

                        $.post('<?php echo base_url("ajax_functions/autorizaColetor")?>', { deviceID: deviceID, coletorStatus: coletorStatus }, function (data) {

                            if (data.result == 'success') {
                                window.location.reload()
                            }

                            if (data.result == 'error') {
                                app.loading('.contain-card', 'close')
                                app.news(data.message, 'error')
                            }

                        }, 'json')
                            .fail(function (data) {
                                app.news('Não foi possível salvar os dados. Entre em contato com o desenvolvedor.', 'error')
                                app.loading('.contain-card', 'close')
                                console.log(data.responseText);
                            });


                        app.loading('.contain-card', 'close')
                        console.log('FIM');

                    });

                $('.nomecoletor').on('focusout', function () {

                    if ($(this).data('lastval') != $(this).val()) {

                        app.loading('.contain-card', 'open')

                        var deviceID = $(this).attr('data-deviceid'),
                            coletorNome = $(this).val()

                        $.post('<?php echo base_url("ajax_functions/nomeColetor")?>', { deviceID: deviceID, coletorNome: coletorNome }, function (data) {

                            if (data.result == 'success') {
                                app.news(data.message, 'success')
                                app.loading('.contain-card', 'close')
                            }

                            if (data.result == 'error') {
                                app.news(data.message, 'error')
                                app.loading('.contain-card', 'close')
                                window.location.reload()
                            }

                        }, 'json')
                            .fail(function (data) {
                                app.news('Não foi possível salvar os dados. Entre em contato com o desenvolvedor.', 'error')
                                app.loading('.contain-card', 'close')
                            });
                    }

                })

                    <? php endif;?>
                <? php if (!empty($form_save)): ?>

                    $('#btnsalvar').on('click', function (event) {

                        app.loading('.contain-card', 'open')
                        var valid = true;

                        var form = $('form');

                        form.find('[required]').each(function (e) {
                            if ($(this).val() == '') {
                                //Materialize.toast('Field '+$(this).attr('title')+' can not be empty' , 5000);
                                $(this).css('border-color', 'red');
                                valid = false;
                                return;
                            }
                        });


                        if (valid == false) {
                            app.loading('.contain-card', 'close')
                            app.news('Confira os campos', 'error')
                            event.preventDefault();
                            return;
                        };

                        form.submit();

                        app.loading('.contain-card', 'close')
                        console.log('SUCCESS');

                    });
                <? php endif;?>
        
                <? php if (!empty($pg_administrativo)):?>

                    $('#local').on('show.bs.modal', function (event) {
                        var button = $(event.relatedTarget) // Button that triggered the modal
                        var rotulo = button.data('rotulo') // Extract info from data-* attributes
                        var tipo = button.data('tipo')
                        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                        var modal = $(this)

                        modal.find('.modal-title').text(rotulo.title)
                        modal.find('.modal-alert').text(rotulo.aviso)

                        if (tipo == 'editar') {
                            modal.find('.modal-content form').append('<input type="hidden" name="editarID" id="editar-id" />')
                            modal.find('.modal-content form input#editar-id').val(rotulo.ideditar)
                        }

                        if (tipo == 'novo') {
                            modal.find('.modal-content form').append('<input type="hidden" id="novo" name="novo" value="novo-estado" required />')
                        }
                    })
        
                    $('#local').on('hidden.bs.modal', function (e) {

                    $('#novo').remove()
                    $('#editar').remove()
                })

                    <? php endif; ?>


                        //NOVA PESQUISA
                        $('#nova').on('click', '#novapesquisa', function (event) {

                            app.loading('.contain-card', 'open')
                            var valid = true;

                            var pesquisaNome = $('#nova input#pesquisaNome').val(),
                                form = $('#nova input#form').val()
                            button = $(this)

                            console.log(pesquisaNome + ' ' + form)
                            $("#nova").find('[required]').each(function (e) {
                                if ($(this).val() == '') {
                                    //Materialize.toast('Field '+$(this).attr('title')+' can not be empty' , 5000);
                                    $(this).css('border-color', 'red')
                                    valid = false
                                    return
                                }
                            });

                            // console.log( form.serialize() )
                            // return

                            if (valid == false) {
                                $('.preloader').fadeOut()
                                app.news('Confira os campos', 'error')
                                event.preventDefault()
                                return
                            }

                            $.post('<?php echo base_url("ajax_functions/salvaPesquisa")?>', { pesquisaNome: pesquisaNome, form: form }, function (data) {

                                console.log();

                                if (data.result == 'success') {

                                    window.location.href = data.redirect
                                }

                                if (data.result == 'error') {
                                    console.log(data);
                                    app.news(data.message, 'error')
                                }

                            }, 'json')
                                .fail(function (data) {
                                    app.news('Não foi possível salvar os dados. Entre em contato com o desenvolvedor.', 'error')
                                    console.log(data.responseText);

                                });

                            app.loading('.contain-card', 'close')

                        });
        
        
                <? php if (!empty($form_save_pesquisa)): ?>

                    /////////////////////////////////////////////////// PESQUISAS

                    $('#btnsalvar').on('click', function (event) {

                        app.loading('.contain-card', 'open')
                        var valid = true;

                        var form = $('form'),
                            button = $(this)

                        form.find('[required]').each(function (e) {
                            if ($(this).val() == '') {
                                //Materialize.toast('Field '+$(this).attr('title')+' can not be empty' , 5000);
                                $(this).css('border-color', 'red')
                                valid = false
                                return
                            }
                        });

                        // console.log( form.serialize() )
                        // return

                        if (valid == false) {
                            $('.preloader').fadeOut()
                            console.log('FAIL')
                            app.news('Confira os campos', 'error')
                            event.preventDefault()
                            return
                        }

                        $.post('<?php echo base_url("ajax_functions/salvaPesquisa")?>', form.serialize(), function (data) {

                            console.log();

                            if (data.result == 'success') {

                                window.location.reload();
                            }

                            if (data.result == 'error') {
                                console.log(data);
                                app.news(data.message, 'error')
                            }

                        }, 'json')
                            .fail(function (data) {
                                app.news('Não foi possível salvar os dados. Entre em contato com o desenvolvedor.', 'error')
                                console.log(data.responseText);

                            });

                        app.loading('.contain-card', 'close')
                        console.log('SUCCESS');

                    });


                $('#btnsalvarecontinuar').on('click', function (event) {

                    $('.preloader').fadeIn(400).show()
                    var valid = true

                    var form = $('form'),
                        button = $(this)

                    form.find('input[required]').each(function (e) {

                        if ($(this).val() == '') {
                            $(this).addclass('error')
                            valid = false
                            return
                        }

                    });

                    if (valid == false) {
                        app.loading('.contain-card', 'close')
                        alert('Campos vazios ');
                        event.preventDefault();
                        return;
                    };

                    $.post('<?php echo base_url("ajax_functions/salvaPesquisa")?>', form.serialize(), function (data) {

                        if (data.result == 'success') {
                            window.location.href = button.data('destino')
                        }

                        if (data.result == 'error') {
                            console.log(data);
                            app.news(data.message, 'error')
                        }

                    }, 'json')
                        .fail(function (data) {
                            app.news('Não foi possível salvar os dados. Entre em contato com o desenvolvedor.', 'error')
                            console.log(data.responseText);

                        });


                    app.loading('.contain-card', 'close')
                    console.log('FIM');

                });

                //DUPLICA PESQUISA
                $('.duplicapesquisa').on('click', function () {
                    app.loading('.contain-card', 'open')

                    var idpesquisa = $(this).data('idpesquisa'), clonaalternativas = $(this).data('clonaalternativas')

                    var campos = { pesquisaID: idpesquisa, clonaAlternativas: clonaalternativas }

                    $.post('<?php echo base_url("ajax_functions/duplicaPesquisa")?>', campos, function (data) {

                        app.news(data.message, data.result)

                        setTimeout(function () {
                            window.location.reload()
                        }, 2000);


                    }, 'json')
                        .fail(function (data) {
                            app.loading('.contain-card', 'close')
                            console.log(data.responseText)
                            $('.result').html(data.responseText)
                        })
                })

                    <? php endif; ?>
        
                <? php if (!empty($form_questoes)): ?>
                    /////////////////////////////////////////////////////////////////////////////////////////// QUESTOES

                    function reordenar() {
                        var data_array = new Array(),
                            ordem = 0


                        $('#questoes').each(function () {

                            $(this).find('.lista-item').each(function () {

                                $(this).attr('data-ordem', ordem++)

                            })
                            //app.news('Lista reordenada','success')
                        })

                        $('#questoes').each(function () {

                            $(this).find('.lista-item').each(function (index) {

                                var item = {}

                                item['ordem'] = $(this).data('ordem')
                                item['questaoID'] = $(this).data('idquestao')

                                data_array.push(item)
                            })

                            //console.log( JSON.stringify(data_array) )

                            $.post('<?php echo base_url("ajax_functions/reordenarQuestoes")?>', { serialized: data_array }, function (data) {

                                console.log(data.message)
                                load_questoes()

                            }, 'json').fail(function (data) {

                                $('.result').html(data.responseText)
                                console.log(data.responseText)
                            })
                        })


                    }
        
                    function load_questoes() {

                    app.loading('#questoes', 'open')

                    $('#questoes').load('<?php echo base_url("dashboard/pesquisas_questoes_load/{$pesquisa->pesquisaID}")?>', function () {

                        var ordem = 0
                        $('.lista').sortable({
                            placeholderClass: 'lista-item',
                            handle: '.handle',
                            cursor: "move",
                            update: function (event, ui) { reordenar() }
                        })

                        $(this).find('.lista-item').each(function () {
                            $(this).attr('data-ordem', ordem++)
                        })

                        app.loading('#questoes', 'close')

                    })
                }

                load_questoes()


                $('.questoespadrao').on('click', function () {

                    $('#rot-questoespadrao').html('')

                    $('#rot-questoespadrao').load('<?php echo base_url("dashboard/pesquisas_load_questoes_padrao/{$pesquisa->pesquisaID}")?>', function (response, status, xhr) {

                        $('#questoespadrao').modal('show')
                    })
                })


                $('#rot-questoespadrao').on('click', '#btnsalvar', function (event) {

                    app.loading('.contain-card', 'open')
                    var form = $('#questoespadrao form')
                    var campos = $('.modal#questoespadrao form').serialize()
                    var valid = true;

                    form.find('input[required]').each(function (e) {

                        if ($(this).val() == '') {
                            app.news('Campos vazios', 'error')
                            $(this).css('border-color', 'red');
                            valid = false;
                            return;
                        }
                    });

                    if (valid == false) {
                        app.loading('.contain-card', 'close')
                        app.news('Campos vazios', 'error')
                        event.preventDefault();
                        return;
                    };

                    //AO INVES DE SUBMITAR O FORM VAMOS FAZER UM AJAX

                    $.post('<?php echo base_url("ajax_functions/clonaQuestoesPadrao")?>', campos, function (data) {

                        console.log(data)

                        if (data.result == 'success') {

                            $('#questoespadrao').modal('hide')
                            $('#questoespadrao').on('hidden.bs.modal', function (e) {

                                load_questoes()
                            })
                            app.news(data.message, 'success')
                        }

                        if (data.result == 'error') {

                            app.news(data.message, 'error')
                        }

                    }, 'json')
                        .fail(function (data) {
                            app.news('Não foi possível salvar os dados. Entre em contato com o desenvolvedor.', 'error')
                            console.log(data.responseText);
                            $('.result').html(data.responseText)
                        });

                    app.loading('.contain-card', 'close')

                })


                function novaalternativa(tipo) {

                    var liberado = 0

                    if (contaelementos() > 0) {

                        $('#alternativas').find('.inside-create').each(function () {

                            if ($(this).val() == '') {

                                liberado++
                                $(this).focus()
                            }
                        })
                    }

                    if (liberado == 0) {

                        var html = '<label class="row label-alt"> <i class="fa fa-sort p-2 handle"></i> <input type="' + tipo + '" disabled class="option-input disabled ' + tipo + ' clear"  /> <input class="inside-create col-8" required name="add[]" placeholder="Insira a alternativa"/> <i class="fa fa-thumb-tack stack"></i> <i class="fa fa-trash lixo"></i> </label> '

                        $('#insert-alt').append(html)

                        procuravazios()
                    }

                }

                function procuravazios() {
                    $('#alternativas').find('.inside-create').each(function () {

                        if ($(this).val() == '') {

                            $(this).focus()
                        }
                    })
                }

                function unicaescolha() {

                    $('#alternativas').show()
                    $('#add-alt').attr('data-tipo', 'radio')

                    novaalternativa('radio')

                }

                function multiplaescolha() {

                    $('#alternativas').show()
                    $('#add-alt').attr('data-tipo', 'checkbox')

                    novaalternativa('checkbox')

                }

                function mudatipo(tipo, classe) {
                    $('#add-alt').attr('data-tipo', tipo)
                    $('#alternativas .option-input').attr('type', tipo).removeClass(classe).addClass(tipo)
                }

                function contaelementos() {
                    $('#alternativas').fadeIn()
                    var count = $('#alternativas .option-input').length
                    return count
                }

                //NOVAS QUESTOES 

                $('.novaquestao').on('click', function () { //

                    $('#rot-editaquestoes').html('')

                    $('#rot-novaquestao').load('<?php echo base_url("dashboard/pesquisas_load_questao_nova/{$pesquisa->pesquisaID}")?>', function (response, status, xhr) {

                        $('#novaquestao').modal('show')

                        $('.alternativas').sortable({
                            placeholderClass: 'label-alt',
                            forcePlaceholderSize: true,
                            placeholder: 'ui-sortable-placeholder',
                            handle: '.handle',
                            cursor: "move",
                            axis: "y"
                            //update: function(event,ui){ return }
                        }).on('click', '.stack', function () {
                            var $this = $(this)
                            console.log($this.hasClass("active"))

                            if ($this.hasClass("active")) {
                                $this.parent().find('.inside-create').attr('name', 'add[]')
                                $this.removeClass('active')
                            } else {
                                $this.parent().find('.inside-create').attr('name', 'add[][stack]')
                                $this.addClass('active')
                            }

                        })
                    })
                })


                $('#rot-novaquestao').on('click', 'input#unica', function () {

                    if (contaelementos() > 0) {
                        mudatipo('radio', 'checkbox')
                    } else {
                        unicaescolha()
                    }
                })

                $('#rot-novaquestao').on('click', 'input#multipla', function () {

                    if (contaelementos() > 0) {
                        mudatipo('checkbox', 'radio')

                    } else {
                        multiplaescolha()
                    }
                })

                $('#rot-novaquestao').on('click', 'input#espontanea', function () {

                    $('#alternativas').fadeOut()
                    $('#insert-alt').html('')
                })

                $('#rot-novaquestao').on('click', 'input#mista', function () {

                    if (contaelementos() > 0) {
                        mudatipo('radio', 'checkbox')
                    } else {
                        unicaescolha()
                    }
                })

                $('#rot-novaquestao').on('click', '#add-alt', function () {

                    if ($(this).attr('data-tipo') == 'radio') {

                        unicaescolha()
                    }

                    if ($(this).attr('data-tipo') == 'checkbox') {
                        multiplaescolha()
                    }
                })

                $('#rot-novaquestao').on('click', '#alternativas .lixo', function () {

                    $(this).parent('label').remove()
                })

                $('#rot-novaquestao').on('click', '#alternativas .stack', function () {

                    //$(this).parent('label').remove()
                })


                $('#rot-novaquestao').on('click', '#btnsalvar', function (event) {

                    app.loading('.contain-card', 'open')
                    var form = $('form')
                    var campos = $('.modal form').serialize()
                    var valid = true;

                    form.find('input[required]').each(function (e) {

                        if ($(this).val() == '') {

                            $(this).css('border-color', 'red');
                            valid = false;
                            return;
                        }

                    });

                    form.find('select[required]').each(function (e) {

                        if ($(this).val() == '') {
                            app.news('Campos vazios', 'error')
                            $(this).css('border-color', 'red');
                            valid = false;
                            return;
                        }

                    });


                    if (valid == false) {
                        app.loading('.contain-card', 'close')
                        app.news('Campos vazios', 'error')
                        event.preventDefault();
                        return;
                    };

                    //AO INVES DE SUBMITAR O FORM VAMOS FAZER UM AJAX

                    $.post('<?php echo base_url("ajax_functions/salvaQuestao")?>', campos, function (data) {



                        if (data.result == 'success') {
                            $('#novaquestao').modal('hide')
                            $('#novaquestao').on('hidden.bs.modal', function (e) {
                                // $('#alternativas').fadeOut()
                                // $('#insert-alt').html('')
                                load_questoes()
                            })
                            app.news(data.message, 'success')
                        }

                        if (data.result == 'error') {

                            app.news(data.message, 'error')
                        }

                    }, 'json')
                        .fail(function (data) {
                            app.news('Não foi possível salvar os dados. Entre em contato com o desenvolvedor.', 'error')
                            console.log(data.responseText);
                        });

                    app.loading('.contain-card', 'close')
                });


                //////////////////////////// /////////// /////////
                /////////////////  EDITA QUESTOES  ///////////////
                //////////////////////////////////////////////////



                $('#questoes').on('click', '.editaquestao', function () { //

                    $('#rot-novaquestao').html('')

                    var idquestao = $(this).data('idquestao')

                    $('#rot-editaquestoes').load('<?php echo base_url("dashboard/pesquisas_load_questao_edita")?>/', { questaoid: idquestao }, function (response, status, xhr) {

                        $('#editaquestao').modal('show')

                        $('.alternativas').sortable({
                            placeholderClass: 'label-alt',
                            forcePlaceholderSize: true,
                            placeholder: 'ui-sortable-placeholder',
                            handle: '.handle',
                            cursor: "move",
                            axis: "y"
                        })
                    })
                })

                $('#rot-editaquestoes').on('change', 'input#base', function () {

                    if ($(this).prop('checked')) {
                        $('input#relatorio').attr('checked', 'true')
                        $('input#obrigatoria').attr('checked', 'true')
                    } else {
                        $('input#relatorio').removeAttr('checked')
                        $('input#obrigatoria').removeAttr('checked')
                    }
                })

                $('#rot-editaquestoes').on('change', 'input#grafico', function () {

                    if ($(this).prop('checked')) {
                        $('.tipoGrafico').show()
                        $('.tipoGrafico select').attr('required', 'true')
                    } else {
                        $('.tipoGrafico').hide()
                        $('.tipoGrafico select').removeAttr('required')
                    }
                })

                $('#rot-editaquestoes').on('click', 'input#unica', function () {

                    if (contaelementos() > 0) {
                        mudatipo('radio', 'checkbox')
                    } else {
                        unicaescolha()
                    }

                })

                $('#rot-editaquestoes').on('click', 'input#multipla', function () {

                    if (contaelementos() > 0) {
                        mudatipo('checkbox', 'radio')
                    } else {
                        multiplaescolha()
                    }
                })

                $('#rot-editaquestoes').on('click', 'input#espontanea', function () {

                    $('#alternativas').fadeOut()
                    //ao inves de remover vamos atribuir remove as alternativas
                    //$('#insert-alt').html('')

                    var t = $('#insert-alt')

                    var idresposta = t.find('input.inside-create').attr('data-idresposta')
                    //ao inves de remover vamos atribuir delete a alternativa e ocular fadeout()
                    if (t.find('input.inside-create').val() == '') {

                        t.find('label').remove()

                    } else {

                        t.find('label').hide()
                        t.find('input.inside-create').attr({ 'name': 'remove[]', 'value': idresposta })
                    }

                })

                $('#rot-editaquestoes').on('click', 'input#mista', function () {

                    if (contaelementos() > 0) {
                        mudatipo('radio', 'checkbox')
                    } else {
                        unicaescolha()
                    }
                })

                $('#rot-editaquestoes').on('click', '#add-alt', function () {

                    var tipo = $(this).attr('data-tipo')

                    if (tipo == 'radio') {
                        unicaescolha()
                    }

                    if (tipo == 'checkbox') {

                        multiplaescolha()
                    }
                })

                $('#rot-editaquestoes').on('click', '#alternativas .lixo', function () {

                    var t = $(this)

                    var idresposta = t.parent('label').find('input.inside-create').attr('data-idresposta')
                    //ao inves de remover vamos atribuir delete a alternativa e ocular fadeout()
                    if (t.parent().find('input.inside-create').val() == '') {

                        t.parent('label').remove()

                    } else {

                        t.parent('label').hide().find('input.inside-create').attr({ 'name': 'remove[]', 'value': idresposta }).removeAttr('required')
                    }

                })

                $('#rot-editaquestoes').on('click', '#alternativas .stack', function () {
                    var $this = $(this)
                    console.log($this.hasClass("active"))

                    if ($this.hasClass("active")) {

                        var newAttr = $this.parent().find('.inside-create').prop('name')
                        newAttr = newAttr.replace(/\[stack\]/g, "")

                        $this.parent().find('.inside-create').attr('name', newAttr)
                        $this.removeClass('active')
                    } else {

                        var newAttr = $this.parent().find('.inside-create').prop('name') + '[stack]'
                        $this.parent().find('.inside-create').attr('name', newAttr)
                        $this.addClass('active')
                    }

                })

                $('#rot-editaquestoes').on('click', '#btnsalvar', function (event) {

                    $('.preloader').fadeIn(400).show()

                    var form = $('form')
                    var campos = $('.modal form').serialize()
                    var valid = true;

                    form.find('input[required]').each(function (e) {

                        if ($(this).val() == '') {
                            $(this).addClass('error')
                            valid = false
                            return
                        }
                    });

                    if (valid == false) {
                        $('.preloader').fadeOut()
                        app.news('Campos vazios', 'error')
                        event.preventDefault()
                        return
                    };

                    //AO INVES DE SUBMITAR O FORM VAMOS FAZER UM AJAX

                    $.post('<?php echo base_url("ajax_functions/editaQuestao")?>', campos, function (data) {

                        //console.log(data)

                        if (data.result == 'success') {
                            $('#editaquestao').modal('hide')
                            $('#editaquestao').on('hidden.bs.modal', function (e) {
                                $('#questoes').load('<?php echo base_url("dashboard/pesquisas_questoes_load/{$pesquisa->pesquisaID}")?>');
                            })
                            app.news(data.message, 'success')
                        }

                        if (data.result == 'error') {
                            app.news(data.message, 'error')
                        }

                    }, 'json')
                        .fail(function (data) {
                            app.news('Não foi possível salvar os dados. Entre em contato com o desenvolvedor.', 'error')
                            console.log(data.responseText)

                        })

                    $('.preloader').fadeOut()
                })

                $('#questoes').on('click', '.excluiquestao', function () {

                    var idquestao = $(this).data('idquestao'),
                        pesquisaid = $(this).data('pesquisaid')

                    $.post('<?php echo base_url("ajax_functions/excluiQuestao")?>', { questaoID: idquestao, pesquisaID: pesquisaid }, function (data) {

                        if (data.result == 'success') {
                            app.news(data.message, 'success')
                            load_questoes()
                        }
                        if (data.result == 'error') {
                            app.news(data.message, 'error')

                        }

                    }, 'json').fail(function (data) {
                        app.news('Não foi possível salvar os dados. Entre em contato com o desenvolvedor.', 'error')
                        console.log(data.responseText)

                    })



                    ///$('#questoes').load('<?php echo base_url("dashboard/pesquisas_questoes_load/{$pesquisa->pesquisaID}")?>')
                })


                    <? php endif; ?>
        
                <? php if (!empty($pg_coletores)): ?>


                    $('.excluircoletor').on('click', function (e) {

                        e.preventDefault()

                        var vinculoID = $(this).data('excluir'),
                            pesquisaid = $(this).data('pesquisaid')

                        $.post('<?php echo base_url("ajax_functions/excluirColetor")?>', { vinculoID: vinculoID, pesquisaID: pesquisaid }, function (data) {

                            if (data.result == 'success') {

                                app.news(data.message, 'success')
                                window.location.reload()
                            }

                            if (data.result == 'error') {
                                app.news(data.message, 'error')
                            }

                        }, 'json')
                            .fail(function (data) {
                                app.news('Não foi possível salvar os dados. Entre em contato com o desenvolvedor.', 'error')
                                console.log(data.responseText)

                            })
                    })

                    <? php endif; ?>
        
                <? php if (!empty($pg_novocoletor)): ?>
                    //VINCULO DE COLETORES

                    function contaVinculos() {

                        var count = $('.vinculo').length
                        return count

                    }
        
                    $('#novolocal').on('click', function (e) {

                    e.preventDefault();

                    var original = $('.vinculo').last(),
                        $cloned = original.clone(),
                        newRowNum = contaVinculos() + 1,
                        originalSelects = original.find('select')

                    $cloned.find('select').each(function (index, item) {
                        //set new select to value of old select
                        $(item).val(originalSelects.eq(index).val())
                    })

                    var originalInputs = original.find('input');

                    $cloned.find('input').each(function (index, item) {
                        //set new textareas to value of old textareas
                        $(item).val(originalInputs.eq(index).val())
                    })


                    original.after($cloned)

                    $('form').find('.vinculo').last().each(function () {
                        $(this).attr('data-local', newRowNum)
                        $(this).find('.estadoid').attr('name', 'add_vinculo[' + newRowNum + '][estadoID]')
                        $(this).find('.cidadeid').attr('name', 'add_vinculo[' + newRowNum + '][cidadeID]')
                        $(this).find('.bairrocomuid').attr('name', 'add_vinculo[' + newRowNum + '][bairroComuID]').focus()
                        $(this).find('.nummincoletas').attr('name', 'add_vinculo[' + newRowNum + '][numMinColetas]')
                        $(this).find('.rot-close').html('<i class="fa fa-close remover"></i>')
                    })

                    $('.max-height90').animate({
                        scrollTop: $('.max-height90').height()
                    }, 1000)

                })

                $('form').on('change', '.estadoid', function () {

                    var cidadeSelect = $(this).parents('.vinculo').find(' .cidadeid')

                    cidadeSelect.html('<option disabled selected value="" > Carregando </option>')


                    $.post('<?php echo base_url("ajax_functions/cidades_load/") ?>', { estadoID: $(this).val() }, function (data) {

                        cidadeSelect.html('<option disabled selected value="" > - Cidade - </option>')

                        if (data != false) {
                            $.each(data, function (index, item) {

                                cidadeSelect.append('<option value="' + item.cidadeID + '" > ' + item.cidadeNome + ' </option>')
                            })

                        } else {

                            cidadeSelect.html('<option disabled selected value="" > Cadastre a cidade </option>')
                        }


                    }, 'json')
                        .fail(function (data) {
                            app.news('Não foi possível salvar os dados. Entre em contato com o desenvolvedor.', 'error')
                            console.log(data.responseText)
                        })
                })

                $('form').on('change', '.cidadeid', function () {

                    var bairroComuSelect = $(this).parents('.vinculo').find('.bairrocomuid')


                    bairroComuSelect.html('<option disabled selected value="" > Carregando </option>')


                    $.post('<?php echo base_url("ajax_functions/bairrosComu_load/") ?>', { cidadeID: $(this).val() }, function (data) {

                        if (data != false) {

                            bairroComuSelect.html('<option disabled selected value="" > - Bairro/Comu/Região - </option>')

                            $.each(data, function (index, item) {

                                bairroComuSelect.append('<option value="' + item.bairroComuID + '" > ' + item.bairroComuNome + ' </option>')
                            })

                        } else {

                            bairroComuSelect.html('<option disabled selected value="" > Cadastre o bairro </option>')
                        }


                    }, 'json')
                        .fail(function (data) {
                            app.news('Não foi possível salvar os dados. Entre em contato com o desenvolvedor.', 'error')
                            console.log(data.responseText)
                        })


                })

                $('form').on('change', '.bairrocomuid', function () {


                    $(this).css('background', 'none')

                    var form = $('form'),
                        thisbairro = $(this),
                        conta = ''

                    form.find('.bairrocomuid').each(function () {

                        if ($(this).val() == thisbairro.val()) {

                            conta++
                        }
                    })

                    if (conta > 1) {
                        $(this).css('background', '#facfce')
                        app.news('Não repita o bairro.', 'error')

                    }

                    var numColetaBairro = $(this).parents('.vinculo').find('.nummincoletas')

                    $.post('<?php echo base_url("ajax_functions/bairrosComuNumColetas_load/") ?>', { bairroComuID: $(this).val() }, function (data) {

                        if (data != false) {

                            if (data.numColetas != null) {

                                numColetaBairro.val(data.numColetas)

                            } else {

                                //app.news('O bairro não tem numero de coletas cadastrada.','info')
                            }
                        }

                    }, 'json')
                        .fail(function (data) {
                            app.news('Erro "Bairro numero de coletas"', 'error')
                            console.log(data.responseText)
                        })
                })

                $('form').on('click', '.remover', function () {
                    $(this).parents('.vinculo').remove()
                })

                $('form').on('click', '.excluir', function () {

                    var coletorLocalID = $(this).attr('data-coletorlocalid')

                    $(this).parents('.vinculo').find('.estadoid').attr('name', 'remove_vinculo[' + coletorLocalID + '][estadoID]')
                    $(this).parents('.vinculo').find('.cidadeid').attr('name', 'remove_vinculo[' + coletorLocalID + '][cidadeID]')
                    $(this).parents('.vinculo').find('.bairrocomuid').attr('name', 'remove_vinculo[' + coletorLocalID + '][bairroComuID]')
                    $(this).parents('.vinculo').find('.nummincoletas').attr('name', 'remove_vinculo[' + coletorLocalID + '][numMinColetas]')

                    $(this).parents('.vinculo').fadeOut().removeClass('vinculo')
                })

                $('#btnsalvar').on('click', function (event) {
                    event.preventDefault()

                    $('.preloader').fadeIn(400).show()

                    var form = $('form'),
                        valid = true,
                        bairros = false

                    form.find('input[required]').each(function (e) {

                        if ($(this).val() == '') {

                            $(this).addClass('message-error')
                            app.news('Campos vazios', 'error')
                            valid = false
                            return
                        }
                    });

                    form.find('.vinculo .bairrocomuid').each(function (e) {

                        $(this).removeClass('message-error')

                        var form = $('form'),
                            thisbairro = $(this).val(),
                            conta = 0


                        form.find('.vinculo .bairrocomuid').each(function () {

                            if ($(this).val() === thisbairro) {
                                conta++
                            }
                        })

                        if (conta > 1) {
                            $(this).addClass('message-error')
                            valid = false
                            bairros = true
                        }

                    })

                    if (bairros) {
                        app.news('Não duplique bairros', 'error')
                    }

                    if (valid == false) {
                        $('.preloader').fadeOut()
                        app.news('Verifique os campos', 'error')
                        return
                    };

                    $.post('<?php echo base_url("ajax_functions/novo_coletor") ?>', form.serialize(), function (data) {

                        if (data.result == 'success') {
                            window.location.href = data.redirect
                        }

                        if (data.result == 'error') {
                            app.news(data.message, 'error')
                        }

                    }, 'json')
                        .fail(function (data) {
                            console.log(data.responseText)
                            app.news('Não foi possível salvar os dados. Entre em contato com o desenvolvedor.', 'error')
                        })

                    // $(form).submit()

                    $('.preloader').fadeOut()
                })


                    <? php endif; ?>
        
                <? php if (!empty($form_questoes_config)): ?>

                    /////////////////////////////////////////////////// QUESTOES


                    function novaalternativa(tipo) {

                        var liberado = 0

                        if (contaelementos() > 0) {

                            $('#alternativas').find('.inside-create').each(function () {

                                if ($(this).val() == '') {

                                    liberado++
                                    $(this).focus()
                                }
                            })
                        }

                        if (liberado == 0) {

                            var html = '<label class="row"><input type="' + tipo + '" disabled class="option-input disabled ' + tipo + ' clear"  /><input class="inside-create col-8 " name="add[]" placeholder="Insira a alternativa"/> <i class="fa fa-trash lixo"></i> </label>'

                            $('#insert-alt').append(html)

                            procuravazios()
                        }

                    }
        
                    function procuravazios() {
                    $('#alternativas').find('.inside-create').each(function () {

                        if ($(this).val() == '') {

                            $(this).focus()
                        }
                    })
                }

                function unicaescolha() {

                    $('#alternativas').show()
                    $('#add-alt').attr('data-tipo', 'radio')

                    novaalternativa('radio')

                }

                function multiplaescolha() {

                    $('#alternativas').show()
                    $('#add-alt').attr('data-tipo', 'checkbox')

                    novaalternativa('checkbox')

                }

                function mudatipo(tipo, classe) {
                    $('#add-alt').attr('data-tipo', tipo)
                    $('#alternativas .option-input').attr('type', tipo).removeClass(classe).addClass(tipo)
                }

                function contaelementos() {

                    var count = $('#alternativas .option-input').length
                    return count
                }



                //NOVAS QUESTOES 

                $('.novaquestao').on('click', function () { //

                    $('#rot-editaquestoes').html('')

                    $('#rot-novaquestao').load('<?php echo base_url("dashboard/config_pesquisas_load_questao_nova/{$get_tipoPesquisa->tipoPesquisaID}")?>', function (response, status, xhr) {

                        $('#novaquestao').modal('show')
                    })
                })

                $('#rot-novaquestao').on('click', 'input#unica', function () {

                    if (contaelementos() > 0) {
                        mudatipo('radio', 'checkbox')
                    } else {
                        unicaescolha()
                    }

                })

                $('#rot-novaquestao').on('click', 'input#multipla', function () {

                    if (contaelementos() > 0) {
                        mudatipo('checkbox', 'radio')

                    } else {
                        multiplaescolha()
                    }
                })

                $('#rot-novaquestao').on('click', 'input#espontanea', function () {

                    $('#alternativas').fadeOut()
                    $('#insert-alt').html('')
                })

                $('#rot-novaquestao').on('click', '#add-alt', function () {

                    if ($(this).attr('data-tipo') == 'radio') {

                        unicaescolha()
                    }

                    if ($(this).attr('data-tipo') == 'checkbox') {
                        multiplaescolha()
                    }
                })

                $('#rot-novaquestao').on('click', '#alternativas .lixo', function () {

                    $(this).parent('label').remove()
                })


                $('#questoes').load('<?php echo base_url("dashboard/config_pesquisas_questoes_load/{$get_tipoPesquisa->tipoPesquisaID}")?>');



                $('#rot-novaquestao').on('click', '#btnsalvar', function (event) {

                    app.loading('.contain-card', 'open')
                    var form = $('form')
                    var campos = $('.modal form').serialize()
                    var valid = true;


                    form.find('input[required]').each(function (e) {

                        if ($(this).val() == '') {
                            //Materialize.toast('Field '+$(this).attr('title')+' can not be empty' , 5000);
                            $(this).css('border-color', 'red');
                            valid = false;
                            return;
                        }

                    });


                    if (valid == false) {
                        app.loading('.contain-card', 'close')
                        app.news('Campos vazios', 'error')
                        event.preventDefault();
                        return;
                    };

                    //AO INVES DE SUBMITAR O FORM VAMOS FAZER UM AJAX

                    $.post('<?php echo base_url("ajax_functions/configSalvaQuestao")?>', campos, function (data) {

                        console.log(data)

                        if (data.result == 'success') {
                            $('#novaquestao').modal('hide')
                            $('#novaquestao').on('hidden.bs.modal', function (e) {
                                // $('#alternativas').fadeOut()
                                // $('#insert-alt').html('')
                                $('#questoes').load('<?php echo base_url("dashboard/config_pesquisas_questoes_load/{$get_tipoPesquisa->tipoPesquisaID}")?>')
                            })
                            app.news(data.message, 'success')
                        }

                        if (data.result == 'error') {

                            app.news(data.message, 'error')
                        }

                    }, 'json')
                        .fail(function (data) {
                            app.news('Não foi possível salvar os dados. Entre em contato com o desenvolvedor.', 'error')
                            console.log(data.responseText);
                        });

                    app.loading('.contain-card', 'close')
                });


                //////////////////////////// /////////// /////////
                /////////////////  EDITA QUESTOES  ///////////////
                //////////////////////////////////////////////////



                $('#questoes').on('click', '.editaquestao', function () { //

                    $('#rot-novaquestao').html('')

                    var idquestao = $(this).data('idquestao')

                    $('#rot-editaquestoes').load('<?php echo base_url("dashboard/config_pesquisas_load_questao_edita")?>/', { questaoid: idquestao }, function (response, status, xhr) {

                        $('#editaquestao').modal('show')
                    })
                })

                $('#rot-editaquestoes').on('click', 'input#unica', function () {

                    if (contaelementos() > 0) {
                        mudatipo('radio', 'checkbox')
                    } else {
                        unicaescolha()
                    }

                })

                $('#rot-editaquestoes').on('click', 'input#multipla', function () {

                    if (contaelementos() > 0) {
                        mudatipo('checkbox', 'radio')
                    } else {
                        multiplaescolha()
                    }
                })

                $('#rot-editaquestoes').on('click', 'input#espontanea', function () {

                    $('#alternativas').fadeOut()
                    //ao inves de remover vamos atribuir delete as alternativas
                    //$('#insert-alt').html('')
                })

                $('#rot-editaquestoes').on('click', '#add-alt', function () {

                    var tipo = $(this).attr('data-tipo')

                    if (tipo == 'radio') {
                        unicaescolha()
                    }

                    if (tipo == 'checkbox') {
                        multiplaescolha()
                    }
                })

                $('#rot-editaquestoes').on('click', '#alternativas .lixo', function () {

                    var t = $(this)

                    var idresposta = t.parent('label').find('input.inside-create').attr('data-idresposta')
                    //ao inves de remover vamos atribuir delete a alternativa e ocular fadeout()
                    if (t.parent().find('input.inside-create').val() == '') {

                        t.parent('label').remove()

                    } else {

                        t.parent('label').hide().find('input.inside-create').attr({ 'name': 'remove[]', 'value': idresposta })
                    }

                })

                $('#rot-editaquestoes').on('click', '#btnsalvar', function (event) {

                    $('.preloader').fadeIn(400).show()

                    var form = $('form')
                    var campos = $('.modal form').serialize()
                    var valid = true;

                    form.find('input[required]').each(function (e) {

                        if ($(this).val() == '') {
                            //Materialize.toast('Field '+$(this).attr('title')+' can not be empty' , 5000);
                            $(this).css('border-color', 'red')
                            valid = false
                            return
                        }
                    });

                    if (valid == false) {
                        $('.preloader').fadeOut()
                        app.news('Campos vazios', 'error')
                        event.preventDefault()
                        return
                    };

                    //AO INVES DE SUBMITAR O FORM VAMOS FAZER UM AJAX

                    $.post('<?php echo base_url("ajax_functions/configEditaQuestao")?>', campos, function (data) {

                        //console.log(data)

                        if (data.result == 'success') {
                            $('#editaquestao').modal('hide')
                            $('#editaquestao').on('hidden.bs.modal', function (e) {
                                $('#questoes').load('<?php echo base_url("dashboard/config_pesquisas_questoes_load/{$get_tipoPesquisa->tipoPesquisaID}")?>');
                            })
                            app.news(data.message, 'success')
                        }

                        if (data.result == 'error') {
                            app.news(data.message, 'error')
                        }

                    }, 'json')
                        .fail(function (data) {
                            app.news('Não foi possível salvar os dados. Entre em contato com o desenvolvedor.', 'error')
                            console.log(data.responseText)

                        })

                    $('.preloader').fadeOut()
                })

                $('#questoes').on('click', '.excluiquestao', function () {

                    var idquestao = $(this).data('idquestao')

                    $.post('<?php echo base_url("ajax_functions/configExcluiQuestao")?>', { questaoID: idquestao }, function (data) {

                        if (data.result == 'success') {
                            app.news('Questão excluída', 'success')
                        }

                    }, 'json').fail(function (data) {
                        app.news('Não foi possível salvar os dados. Entre em contato com o desenvolvedor.', 'error')
                        console.log(data.responseText)

                    })

                    $('#questoes').load('<?php echo base_url("dashboard/config_pesquisas_questoes_load/{$get_tipoPesquisa->tipoPesquisaID}")?>')
                })



                    <? php endif; ?>
        
                <? php if (!empty($pg_consolidar)):?>

                    $('#consolidar').on('click', function () {

                        var pesquisaID = $(this).data('pesquisaid')

                        $.post('<?php echo base_url("ajax_functions/agendaTarefa")?>', { pesquisaID: pesquisaID, tarefa: 'consolidarColetas' }, function (data) {

                            if (data.status == true) {

                                app.news(data.message, 'success')

                                setTimeout(function () {

                                    window.location.reload()

                                }, 2000)
                            }

                            if (data.status == false) {
                                app.news(data.message, 'error')
                            }


                        }, 'json').fail(function (data) {
                            app.news('Não foi possível consolidar os dados. Entre em contato com o desenvolvedor.', 'error')
                            console.log(data.responseText)

                        })

                        //$('#questoes').load('<?php //echo base_url("dashboard/config_pesquisas_questoes_load/{$get_tipoPesquisa->tipoPesquisaID}")?>')
                    })

                    <? php endif;?>
        
                <? php if (!empty($pg_bairrosextra)): ?>

                    $('form').on('change', '.estadoid', function () {

                        var cidadeSelect = $(this).parents('.vinculo').find('.cidadeid')

                        cidadeSelect.html('<option disabled selected value="" > Carregando </option>')


                        $.post('<?php echo base_url("ajax_functions/cidades_load/") ?>', { estadoID: $(this).val() }, function (data) {

                            cidadeSelect.html('<option disabled selected value="" > - Cidade - </option>')

                            if (data != false) {
                                $.each(data, function (index, item) {

                                    cidadeSelect.append('<option value="' + item.cidadeID + '" > ' + item.cidadeNome + ' </option>')
                                })

                            } else {

                                cidadeSelect.html('<option disabled selected value="" > Nenhuma cidade </option>')
                            }


                        }, 'json')
                            .fail(function (data) {
                                app.news('Não foi possível salvar os dados. Entre em contato com o desenvolvedor.', 'error')
                                console.log(data.responseText)
                            })
                    })
        
                    $('form').on('change', '.cidadeid', function () {

                    var bairroComuSelect = $(this).parents('.vinculo').find('.bairrocomuid')

                    bairroComuSelect.html('<option disabled selected value="" > Carregando </option>')


                    $.post('<?php echo base_url("ajax_functions/bairrosComu_load/") ?>', { cidadeID: $(this).val() }, function (data) {

                        if (data != false) {

                            bairroComuSelect.html('<option disabled selected value="" > - Bairro/Comu/Região - </option>')

                            $.each(data, function (index, item) {

                                bairroComuSelect.append('<option value="' + item.bairroComuID + '" > ' + item.bairroComuNome + ' </option>')
                            })

                            bairroComuSelect.append('<option selected value="0" > Novo bairro </option>')

                        } else {

                            bairroComuSelect.html('<option selected value="0" > Novo bairro </option>')
                        }


                    }, 'json')
                        .fail(function (data) {
                            app.news('Não foi possível salvar os dados. Entre em contato com o desenvolvedor.', 'error')
                            console.log(data.responseText)
                        })


                })
                    <? php endif; ?>
        
                <? php if (!empty($pg_relatorios)): ?>

                    $('#editor-relatorio')
                        .trumbowyg({
                            btns: ['strong', 'em', '|', 'undo', 'redo', 'formatting', 'justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull', 'unorderedList', 'orderedList', 'formatting'],
                            semantic: true,
                            autogrow: true,
                            autogrowOnEnter: true,
                            imageWidthModalEdit: true
                        })
                    
                    var timeout = null;

                $('#editor-relatorio').on('tbwchange', function () {
                    var text = $(this).val(), pesquisaId = $(this).data('pesquisaid')

                    clearTimeout(timeout);

                    timeout = setTimeout(function () {

                        $.post('<?php echo base_url("ajax_functions/updateConfigPesquisa/") ?>', { pesquisaID: pesquisaId, campos: { relatorioDescritivo: text } }, function (data) {

                            if (data.result == false) {
                                console.log('Erro')

                            } else {
                                console.log('SALVO')
                            }

                        }, 'json')
                            .fail(function (data) {
                                app.news('Não foi possível salvar os dados. Entre em contato com o desenvolvedor.', 'error')
                                console.log(data.responseText)
                            })
                    }, 1500);

                })

                var updateConfigPesquisa = function (req) {
                    $.post('<?php echo base_url("ajax_functions/updateConfigPesquisa")?>', req, function (data) {
                        console.log(data)
                    }, 'json')
                        .fail(function (e) {
                            console.log(e)
                        })
                }


                $('select.relatorioAnalitico').on('change', function () {

                    var id = $(this).parents('.relatorioConfig').data('pesquisaid'),
                        visual = $(this).val()

                    updateConfigPesquisa({ pesquisaID: id, campos: { relatorioAnalitico: visual } })

                })


                var updateCampo = function (dados) {

                    $.post('<?php echo base_url("ajax_functions/updateConfigQuestao")?>', dados, function (data) {
                        console.log(data)
                    }, 'json')
                        .fail(function (d) {
                            console.log(d)
                        })

                }

                $('select.relatorioAnalitico').on('change', function () {
                    if ($(this).val() == 1) {
                        $('.grafico').parents('.form-group').show()
                        $('.graficoTipo').parents('.form-group').show()
                    }

                    if ($(this).val() == 2) {
                        $('.grafico').parents('.form-group').hide()
                        $('.graficoTipo').parents('.form-group').hide()
                    }

                    if ($(this).val() == 3) {
                        $('.grafico').parents('.form-group').show()
                        $('.graficoTipo').parents('.form-group').show()
                    }
                })

                $('input.base').on('change', function () {

                    var id = $(this).parents('.questaoConfig').attr('id'),
                        relatorio = $('.questaoConfig#' + id + ' input#relatorio')

                    if ($(this).prop('checked')) {
                        relatorio.attr('checked', 'true')

                        updateCampo({ questaoID: id, campos: { questaoBase: 1, questaoRelatorio: 1 } })

                    } else {
                        relatorio.removeAttr('checked')
                        updateCampo({ questaoID: id, campos: { questaoBase: 0 } })
                    }
                })

                $('input.relatorio').on('change', function () {

                    var id = $(this).parents('.questaoConfig').attr('id')

                    if ($(this).prop('checked')) {
                        updateCampo({ questaoID: id, campos: { questaoRelatorio: 1 } })

                    } else {
                        updateCampo({ questaoID: id, campos: { questaoRelatorio: 0 } })
                    }
                })

                $('input.grafico').on('change', function () {

                    var id = $(this).parents('.questaoConfig').attr('id'),
                        grafico = $('.questaoConfig#' + id + ' .tipoGrafico'),
                        select = $('.questaoConfig#' + id + ' .tipoGrafico select'),
                        tipo = select.val(),
                        relatorio = $('.questaoConfig#' + id + ' input#relatorio')

                    if ($(this).prop('checked')) {
                        grafico.show()
                        select.attr('required', 'true')
                        relatorio.attr('checked', 'false')
                        relatorio.attr('checked', 'true')

                        console.log(tipo)
                        updateCampo({ questaoID: id, campos: { questaoGraficoAtivo: 1, questaoTipoGrafico: tipo } })
                    } else {
                        grafico.hide()
                        select.removeAttr('required')
                        updateCampo({ questaoID: id, campos: { questaoGraficoAtivo: 0 } })
                    }
                })

                $('select.graficoTipo').on('change', function () {

                    var id = $(this).parents('.questaoConfig').attr('id'),
                        tipo = $(this).val()

                    updateCampo({ questaoID: id, campos: { questaoTipoGrafico: tipo } })

                })

                    <? php endif;?>
        
        
        
              });