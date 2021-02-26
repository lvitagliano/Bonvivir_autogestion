import Generic from '../../support/Generic/GenericClass';
import Landing from '../../support/Landing/Landing';

context('Form Step 1', () => {
  describe('pre condition to Step1 Fail', () => {
    it('selection', () => {
      Generic.visit();
      Landing.seleccion('AltaGama');
      Generic.continuar();
    });

    it('test step', () => {
      Generic.registrationCupsStep1(1);
    });

    it('test selectionCheckPrice', () => {
      Generic.checkPrice('AltaGama');
    });
  });

  describe('Test inputs Fail', () => {
    it('test link inputs empty', () => {
      Generic.continuar('.registration__link');
      Generic.objectNotBeVisible('.custom-modal-content');
    });

    it('test boton Continuar', () => {
      Generic.continuar();
      cy.get(':nth-child(1) > .error-input').should(
        'have.text',
        'Por favor ingresá tu nombre. '
      );

      cy.get(':nth-child(2) > .error-input').should(
        'have.text',
        'Por favor ingresá tu apellido. '
      );
      cy.get(':nth-child(3) > .error-input').should(
        'have.text',
        'Por favor ingresá tu código de área sin el 0, por ejemplo, si sos de Bs As tu código es el 11. Por favor ingresá un número de contacto. '
      );
      cy.get(':nth-child(4) > .error-input').should(
        'have.text',
        'Por favor ingresá tu email. '
      );
      cy.get(':nth-child(5) > .error-input').should(
        'have.text',
        'Por favor ingresá una fecha de nacimiento válida. '
      );
    });

    it('test campos available_disable', () => {
      Generic.fieldNotBeDisabled('name');
      Generic.fieldDisabled('lastName');
      Generic.fieldDisabled('cod');
      Generic.fieldDisabled('tel');
      Generic.fieldDisabled('email');

      cy.get('[name="date.day"]').should('be.disabled');
      cy.get('[name="date.month"]').should('be.disabled');
      cy.get('[name="date.year"]').should('be.disabled');
    });

    it('test email y mayor de edad', () => {
      cy.get("[name='name']").type('Nombre');
      cy.get("[name='lastName']").type('Apellido');
      cy.get("[name='cod']").type('11');
      cy.get("[name='tel']").type('12341234');

      cy.get("[name='email']").type('pepe@email.com');

      cy.get('[name="date.day"]').select('31');
      cy.get('[name="date.month"]').select('Diciembre');
      cy.get('[name="date.year"]').select('2001');
      Generic.continuar();
      cy.get(':nth-child(5) > .error-input').should(
        'have.text',
        '¡Lo sentimos! Tenes que ser mayor de 18 años para suscribirte. '
      );
      cy.get('[name="date.year"]').select('1978'); // does not have to show alerts to check modal
    });

    it('test link', () => {
      cy.get('[class="registration__link"]').should(
        'have.text',
        'Prefiero que me llamen para finalizar'
      );
      Generic.continuar('.registration__link');
      Generic.objectBeVisible('.custom-modal-content');
      Generic.continuar('.close');
      cy.get(':nth-child(3) > .registration__title > .title__h3').should(
        'have.text',
        'Datos personales'
      );
    });
  });

  describe('pre condition to Step1 Ok', () => {
    it('selection', () => {
      Generic.visit();
      Generic.continuar();
    });

    it('test step', () => {
      Generic.registrationCupsStep1(1);
    });
  });

  describe('Test inputs OK', () => {
    it('test Nombres', () => {
      cy.get('.registration__form > :nth-child(1) > .form-control')
        .type('nombre de longitud treinta y dos', { delay: 100 })
        .should('have.value', 'nombre de longitud treinta y d');
    });

    it('test Apellidos', () => {
      cy.get('.registration__form > :nth-child(2) > .form-control')
        .type('apellido de longitud treintaaaw', { delay: 100 })
        .should('have.value', 'apellido de longitud treintaaa');
    });

    it('test Cod Area.', () => {
      cy.get('.registration__container-tel > :nth-child(1) > .form-control')
        .type('11', { delay: 100 })
        .should('have.value', '11');
    });

    it('test Numero Telefonico', () => {
      cy.get('.input-number > .form-control')
        .type('49006767', { delay: 100 })
        .should('have.value', '49006767');
    });

    it('test Correo Electrónico', () => {
      cy.get(':nth-child(4) > .form-control')
        .type('vanesag@gmail.com', { delay: 100 })
        .should('have.value', 'vanesag@gmail.com');
    });

    it('test Fecha de nacimiento', () => {
      cy.get('[name="date.day"]').select('19');
      cy.get('[name="date.month"]').select('Abril');
      cy.get('[name="date.year"]').select('1978');
    });

    it('test boton Continuar', () => {
      cy.get('.button__primary').click();
    });

    it('test titulo', () => {
      cy.get(':nth-child(3) > .registration__title > .title__h3').should(
        'have.text',
        'Datos de facturación'
      );
    });
  });
});
