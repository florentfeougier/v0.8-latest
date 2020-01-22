<?php $__env->startSection('template_title'); ?>
  Paiement N°<?php echo e($payment->ref_id); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Paiement N°<?php echo e($payment->ref_id); ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo e(url("manager/dashboard")); ?>">Accueil</a></li>
              <li class="breadcrumb-item"><a href="<?php echo e(url("manager/payments")); ?>">Paiements</a></li>
              <li class="breadcrumb-item active"><?php echo e($payment->ref_id); ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

 <section class="content">
    
  <?php if($payment->response_code != "00000" ): ?>
  <div class="alert alert-warning" role="alert">
    Le client a été redirigé vers la page de paiement mais n'a pas encore validé la transaction. <a href="<?php echo e(url("manager/orders/" . $payment->id . "/unpaidNotificationCheck")); ?>" class="text-dark"> <b>Relancer par email <i class="fa fa-envelope"></i> </b> </a>
  </div>
<?php else: ?>
  <div class="alert alert-success" role="alert">
    Ce paiement a été accepté! Numéro de transaction: <?php echo e($payment->transaction_number); ?>

  </div>
<?php endif; ?>

    <div class="row">

      <div class="col-lg-8">
        <div class="card">
          <div class="card-header">
            Détails de la transaction
          </div>
          <div class="card-body">
            <div class="col-sm-5 col-6 text-larger">
                          <strong>
                            Utilisateur
                          </strong>
                        </div>

                        <div class="col-sm-7">
                          <a href="<?php echo e(url("manager/users/")); ?><?php echo e($payment->order->user->id ?? "deletd"); ?>"><?php echo e($payment->user->email ?? "Ce paiement n'est associé à aucun utilisateur."); ?></a>
                        </div>


                        <div class="clearfix"></div>
                        <div class="bpayment-bottom"></div>

 <div class="col-sm-5 col-6 text-larger">
                          <strong>
                            Montant (TTC)
                          </strong>
                        </div>

                        <div class="col-sm-7">
                          <?php echo e($payment->amount ?? "Inconnu"); ?>€
                        </div>


                        <div class="clearfix"></div>
                        <div class="bpayment-bottom"></div>

           



                        <div class="col-sm-5 col-6 text-larger">
                          <strong>
                            Numéro de transaction
                          </strong>
                        </div>

                        <div class="col-sm-7">
                          <?php echo e($payment->transaction_number ?? "Aucun"); ?>

                        </div>


                        <div class="clearfix"></div>
                        <div class="bpayment-bottom"></div>

                                    <div class="col-sm-5 col-6 text-larger">
                                      <strong>
                                        Call number
                                      </strong>
                                    </div>

                                    <div class="col-sm-7">
                                      <?php echo e($payment->call_number ?? "Aucun"); ?>

                                    </div>


                                    <div class="clearfix"></div>
                                    <div class="bpayment-bottom"></div>

                                    <div class="col-sm-5 col-6 text-larger">
                                      <strong>
                                       Méthode de paiment
                                      </strong>
                                    </div>

                                    <div class="col-sm-7">
                                      <?php echo e($payment->payment_method ?? "Aucune"); ?>

                                    </div>


                                    <div class="clearfix"></div>
                                    <div class="bpayment-bottom"></div>

            <div class="col-sm-5 col-6 text-larger">
              <strong>
                <?php echo e(trans('paymentsmanagement.labelStatus')); ?>

              </strong>
            </div>

            <div class="col-sm-7">
              <?php if($payment->status == true && $payment->response_code == '00000'): ?>
                <span class="badge badge-success">
                  Validé
                </span>
              <?php elseif($payment->response_code != '00000' && $payment->transaction_number != null): ?>
                <span class="badge badge-danger">
                  Refusé
                </span>
              <?php else: ?>
                <span class="badge badge-warning">
                  En attente
                </span>
              <?php endif; ?>
            </div>


            <div class="clearfix"></div>
            <div class="bpayment-bottom"></div>

            <?php if($payment->created_at): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Crée le
                </strong>
              </div>

              <div class="col-sm-7">
                <?php echo e($payment->created_at); ?>

              </div>

              <div class="clearfix"></div>
              <div class="bpayment-bottom"></div>

            <?php endif; ?>

            <?php if($payment->updated_at): ?>

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Modifié le
                </strong>
              </div>

              <div class="col-sm-7">
                <?php echo e($payment->updated_at); ?>

              </div>

              <div class="clearfix"></div>
              <div class="bpayment-bottom"></div>

            <?php endif; ?>
          </div>
        </div>
      </div>

   <div class="col-lg-4">
        <div class="card">
          <div class="card-header">
            Commande associée
          </div>
          <div class="card-body">
            

             








          </div>
        </div>
      </div>

     

       
      </div>
    </div>
  </div>

  <?php echo $__env->make('modals.modal-delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
  <?php echo $__env->make('scripts.delete-modal-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php if(config('paymentsmanagement.tooltipsEnabled')): ?>
    <?php echo $__env->make('scripts.tooltips', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php endif; ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.manager', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florent/Dev/plantesaddict/prod/resources/views/paymentsmanagement/show-payment.blade.php ENDPATH**/ ?>