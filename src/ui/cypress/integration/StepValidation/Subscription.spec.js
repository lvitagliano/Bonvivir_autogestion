context('Form Subscription', () => {
  describe('Test subscription', () => {
    it('selection', () => {
      cy.viewport(1280, 720);
      cy.visit('subscription');
    });

    it('test titulo', () => {
      cy.get('.ModalMsj__h1').should('have.text', '¡Felicitaciones!');
    });
    it('test titulo2', () => {
      cy.get('.ModalMsj__h2').should('have.text', 'Ya sos parte del Club');
    });
    it('test boton registrate', () => {
      cy.get('.button__primary').should('have.text', 'Registrate');
    });
  });
});
