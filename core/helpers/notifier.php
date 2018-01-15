<?php
    class Notifier {

        public static function success ($message) {

            echo '<div class="systemAlert alert alert-success alert-dismissabl text-center">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                       ' . $message . '
                  </div>';

        }

        public static function info ($message) {

            echo '<div class="systemAlert alert alert-info alert-dismissabl text-center">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                       ' . $message . '
                  </div>';

        }

        public static function warning ($message) {

            echo '<div class="systemAlert alert alert-warning alert-dismissabl text-center">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                       ' . $message . '
                  </div>';

        }

        public static function danger ($message) {

            echo '<div class="systemAlert alert alert-danger alert-dismissabl text-center">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                       ' . $message . '
                  </div>';

        }

        public static function primary ($message) {

            echo '<div class="systemAlert alert alert-primary alert-dismissabl text-center">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                       ' . $message . '
                  </div>';

        }

        public static function secondary ($message) {

            echo '<div class="systemAlert alert alert-secondary alert-dismissabl text-center">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                       ' . $message . '
                  </div>';

        }

        public static function dark ($message) {

            echo '<div class="systemAlert alert alert-dark alert-dismissabl text-center">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                       ' . $message . '
                  </div>';

        }

        public static function light ($message) {

            echo '<div class="systemAlert alert alert-light alert-dismissabl text-center">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                       ' . $message . '
                  </div>';

        }

    }
?>