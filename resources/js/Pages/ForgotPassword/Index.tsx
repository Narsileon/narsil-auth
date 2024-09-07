import { FormModel } from "@narsil-forms/Types";
import { useTranslationsStore } from "@narsil-localization/Stores/translationStore";
import AppHead from "@narsil-ui/Components/App/AppHead";
import BackButton from "@narsil-ui/Components/Button/BackButton";
import Button from "@narsil-ui/Components/Button/Button";
import Form from "@narsil-forms/Components/Form/Form";
import FormProvider from "@narsil-forms/Components/Form/FormProvider";
import FormRenderer from "@narsil-forms/Components/Form/FormRenderer";
import Fullscreen from "@narsil-ui/Components/Fullscreen/Fullscreen";
import FullscreenToggle from "@narsil-ui/Components/Fullscreen/FullscreenToggle";
import Section from "@narsil-ui/Components/Section/Section";
import SectionContent from "@narsil-ui/Components/Section/SectionContent";
import SectionFooter from "@narsil-ui/Components/Section/SectionFooter";
import SectionHeader from "@narsil-ui/Components/Section/SectionHeader";
import SectionTitle from "@narsil-ui/Components/Section/SectionTitle";
import useForm from "@narsil-forms/Components/Form/useForm";

interface Props {
	form: FormModel;
	status: string;
}

const Index = ({ form, status }: Props) => {
	const { trans } = useTranslationsStore();

	const reactForm = useForm({
		form: form,
	});

	return (
		<>
			<AppHead
				description={form.title}
				keywords={form.title}
				title={form.title}
			/>
			<FormProvider {...reactForm}>
				<Form route={route("password.email")}>
					<Fullscreen>
						<Section>
							<SectionHeader>
								<SectionTitle>{form.title}</SectionTitle>
								<FullscreenToggle />
							</SectionHeader>
							<SectionContent className='text-sm'>
								<FormRenderer nodes={form.nodes} />
								{status ? <span className='text-constructive font-medium'>{status}</span> : null}
							</SectionContent>
							<SectionFooter>
								<Button type='submit'>{trans("Send")}</Button>
								<BackButton href={route("login")} />
							</SectionFooter>
						</Section>
					</Fullscreen>
				</Form>
			</FormProvider>
		</>
	);
};

export default Index;
