import Generic from '../../support/Generic/GenericClass';
import Landing from '../../support/Landing/Landing';

context('landing', () => {
  it('selection', () => {
    Generic.visit();
  });

  describe('Test select', () => {
    it('test SeleccionExclusiva', () => {
      cy.viewport(1280, 720);
      Landing.seleccion('Exclusiva');
    });

    it('test SeleccionExclusivaBlanca', () => {
      cy.viewport(1280, 720);
      Landing.seleccion('ExclusivaBlanca');
    });

    it('test SeleccióndeAltaGama', () => {
      cy.viewport(1280, 720);
      Landing.seleccion('AltaGama');
    });

    it('test tengoClubLaNacion', () => {
      cy.viewport(1280, 720);

      cy.get('.checkbox > p').contains('Tengo la tarjeta Club LA NACION');
      cy.get('.main-container__footer__img').should('exist');
      // Landing.checkCheckbox('.checkmark'); to this case not working but how dont show error i prefer not use.
      cy.get('.checkmark').click();
    });
  });
});
