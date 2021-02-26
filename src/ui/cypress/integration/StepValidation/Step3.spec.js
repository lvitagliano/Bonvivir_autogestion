context('Form Step 3', () => {
  describe('pre condition to Step3 Fail', () => {
    it('selection', () => {
      cy.viewport(1280, 720);
      cy.visit('selection');
      cy.get('.button__primary').click();
      cy.get("[name='name']").type('Nombre');
      cy.get("[name='lastName']").type('Apellido');
      cy.get("[name='cod']").type('11');
      cy.get("[name='tel']").type('12341234');
      cy.get("[name='email']").type('pepe@email.com');
      cy.get('[name="date.day"]').select('31');
      cy.get('[name="date.month"]').select('Diciembre');
      cy.get('[name="date.year"]').select('1987');
      cy.get('.button__primary').click();
      cy.get('#proofOfPayment').select('Responsable Inscripto');
      cy.get('[name="cuit"]').type('27268731569');
      cy.get('[name="cardNumber"]').type('6391300083977836');
      cy.get('.button__primary').click();
    });
  });

  describe('Test inputs Step 3 Fail', () => {
    it('test titulo', () => {
      cy.viewport(1280, 720);
      cy.get('.button__primary').click();
    });

    it('test address fail', () => {
      cy.get(':nth-child(1) > .error-input').should(
        'have.text',
        'Por favor ingresá la calle. Por favor ingresá la altura. '
      );
      cy.get(':nth-child(2) > .error-input').should(
        'have.text',
        'Por favor ingresá el código postal. '
      );
    });
  });

  describe('pre condition to Step3 Ok', () => {
    it('selection', () => {
      cy.viewport(1280, 720);
      cy.visit('selection');
      cy.get('.button__primary').click();
      cy.get("[name='name']").type('Nombre');
      cy.get("[name='lastName']").type('Apellido');
      cy.get("[name='cod']").type('11');
      cy.get("[name='tel']").type('12341234');
      cy.get("[name='email']").type('pepe@email.com');
      cy.get('[name="date.day"]').select('31');
      cy.get('[name="date.month"]').select('Diciembre');
      cy.get('[name="date.year"]').select('1987');
      cy.get('.button__primary').click();
      cy.get('#proofOfPayment').select('Responsable Inscripto');
      cy.get('[name="cuit"]').type('27268731569');
      cy.get('[name="cardNumber"]').type('6391300083977836');
      cy.get('.button__primary').click();
    });
  });

  describe('Test inputs Step 3 Ok', () => {
    it('test titulo', () => {
      cy.viewport(1280, 720);
      cy.get(':nth-child(3) > .registration__title > .title__h3').should(
        'have.text',
        'Datos de envío'
      );
    });

    it('test copa', () => {
      cy.viewport(1280, 720);
      cy.get('.registration__cup-steps > :nth-child(3) > img')
        .parent()
        .should('have.class', 'step--active');
    });

    it('test calle nro codigo piso depto', () => {
      cy.viewport(1280, 720);
      cy.get('[name="street"]').type('Av. Segurola');
      cy.get('[name="streetNumber"]').type('1546');
      cy.get('[name="zipCode"]').type('1407');
      cy.get('[name="floorApartment"]').type('8vo');
      cy.get('[name="apartment"]').type('D');
      cy.get('[name="additionalData"]').type(
        'Datos Adicionales respecto de la dirección'
      );
    });
    it('test boton Continuar', () => {
      cy.viewport(1280, 720);
      cy.get('.button__primary').click();
    });
  });
});
